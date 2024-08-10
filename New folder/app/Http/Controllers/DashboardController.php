<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agunan;
use App\Models\Pinjaman;
use App\Models\ProdukPinjaman;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index() {
        $kredit = Pinjaman::count();
        $kredit1 = Pinjaman::where('status', 'Belum Selesai')
            ->count();
        $kredit2 = Pinjaman::where('status', 'Selesai')
            ->count();
        $total = Agunan::sum('nilai_pengikatan');
        $total1 = Pinjaman::where('status', 'Belum Selesai')
            ->with('agunan')
            ->get()
            ->sum(function ($pinjaman) {
                return $pinjaman->agunan->nilai_pengikatan;
            });
        $total2 = Pinjaman::where('status', 'Selesai')
            ->with('agunan')
            ->get()
            ->sum(function ($pinjaman) {
                return $pinjaman->agunan->nilai_pengikatan;
            });

        $totalNilaiPengikatanAllProducts = ProdukPinjaman::with(['pinjaman.agunan'])
            ->get()
            ->flatMap(function ($produk) {
                return $produk->pinjaman;
            })
            ->sum(function ($pinjaman) {
                return $pinjaman->agunan ? $pinjaman->agunan->nilai_pengikatan : 0;
            });
        $produk = ProdukPinjaman::with(['pinjaman.agunan'])
            ->get()
            ->map(function ($produk) use ($totalNilaiPengikatanAllProducts) {
                $totalNilaiPengikatanProduct = $produk->pinjaman->sum(function ($pinjaman) {
                    return $pinjaman->agunan ? $pinjaman->agunan->nilai_pengikatan : 0;
                });
        
                $percentage = $totalNilaiPengikatanAllProducts > 0 ? ($totalNilaiPengikatanProduct / $totalNilaiPengikatanAllProducts) * 100 : 0;
        
                return [
                    'no' => $produk->id_produk,
                    'nama_produk' => $produk->nama_produk,
                    'percentage' => $percentage,
                    'total_nilai_pengikatan' => $totalNilaiPengikatanProduct,
                ];
            });
        $monthlyData = Pinjaman::selectRaw('YEAR(tanggal_pinjaman) as year, MONTH(tanggal_pinjaman) as month, SUM(nilai_pengikatan) as total_nilai_pengikatan')
            ->join('agunan', 'pinjaman.id_agunan', '=', 'agunan.id_agunan')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get()
            ->map(function ($data) {
                return [
                    'year' => $data->year,
                    'month' => Carbon::create()->month($data->month)->format('F'),
                    'total_nilai_pengikatan' => $data->total_nilai_pengikatan,
                ];
            });

        return view('dashboard', compact('total','total1','total2','kredit','kredit1','kredit2','produk', 'totalNilaiPengikatanAllProducts','monthlyData'));
    }
}

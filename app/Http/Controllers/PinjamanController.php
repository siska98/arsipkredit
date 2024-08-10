<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;

class PinjamanController extends Controller
{
    public function index()
    {
        // Mengambil data pinjaman dari database
        $pinjaman = Pinjaman::leftJoin('detail_pinjaman_kur', 'Pinjaman.id_pinjaman', '=', 'detail_pinjaman_kur.id_pinjaman')
            ->leftJoin('Agunan', 'Pinjaman.id_agunan', '=', 'Agunan.id_agunan')
            ->where('Pinjaman.id_produk', 1) // Menambahkan kriteria where untuk id_produk = 1
            ->where('status', 'Belum Selesai')
            ->select('Pinjaman.*', 'detail_pinjaman_kur.jenis_usaha', 'Agunan.jenis_agunan', 'Agunan.nama_pemilik_agunan', 'Agunan.jenis_pengikat', 'Agunan.nilai_pengikatan', 'Agunan.keterangan')
            ->get();
        
        $pinjamankpr = Pinjaman::leftJoin('detail_pinjaman_kpr', 'Pinjaman.id_pinjaman', '=', 'detail_pinjaman_kpr.id_pinjaman')
            ->leftJoin('Agunan', 'Pinjaman.id_agunan', '=', 'Agunan.id_agunan')
            ->where('Pinjaman.id_produk', 2)
            ->where('status', 'Belum Selesai')
            ->select('Pinjaman.*', 'detail_pinjaman_kpr.tipe_rumah', 'detail_pinjaman_kpr.alamat_rumah', 'Agunan.jenis_agunan', 'Agunan.nama_pemilik_agunan', 'Agunan.jenis_pengikat', 'Agunan.nilai_pengikatan', 'Agunan.keterangan')
            ->get();    

        $pinjamankendaraan = Pinjaman::leftJoin('detail_pinjaman_kendaraan', 'Pinjaman.id_pinjaman', '=', 'detail_pinjaman_kendaraan.id_pinjaman')
            ->leftJoin('Agunan', 'Pinjaman.id_agunan', '=', 'Agunan.id_agunan')
            ->where('Pinjaman.id_produk', 3)
            ->where('status', 'Belum Selesai')
            ->select('Pinjaman.*', 'detail_pinjaman_kendaraan.tipe_kendaraan', 'detail_pinjaman_kendaraan.merk_kendaraan', 'detail_pinjaman_kendaraan.tahun_pembuatan', 'Agunan.jenis_agunan', 'Agunan.nama_pemilik_agunan', 'Agunan.jenis_pengikat', 'Agunan.nilai_pengikatan', 'Agunan.keterangan')
            ->get(); 
            
        $pinjamanmultiguna = Pinjaman::leftJoin('detail_pinjaman_multiguna', 'Pinjaman.id_pinjaman', '=', 'detail_pinjaman_multiguna.id_pinjaman')
            ->leftJoin('Agunan', 'Pinjaman.id_agunan', '=', 'Agunan.id_agunan')
            ->where('Pinjaman.id_produk', 4)
            ->where('status', 'Belum Selesai')
            ->select('Pinjaman.*', 'detail_pinjaman_multiguna.keperluan', 'Agunan.jenis_agunan', 'Agunan.nama_pemilik_agunan', 'Agunan.jenis_pengikat', 'Agunan.nilai_pengikatan', 'Agunan.keterangan')
            ->get(); 
            
        $pinjamaninvestasi = Pinjaman::leftJoin('detail_pinjaman_investasi', 'Pinjaman.id_pinjaman', '=', 'detail_pinjaman_investasi.id_pinjaman')
            ->leftJoin('Agunan', 'Pinjaman.id_agunan', '=', 'Agunan.id_agunan')
            ->where('Pinjaman.id_produk', 5)
            ->where('status', 'Belum Selesai')
            ->select('Pinjaman.*', 'detail_pinjaman_investasi.tujuan_investasi', 'Agunan.jenis_agunan', 'Agunan.nama_pemilik_agunan', 'Agunan.jenis_pengikat', 'Agunan.nilai_pengikatan', 'Agunan.keterangan')
            ->get();
          
        $pinjamanpendidikan = Pinjaman::leftJoin('detail_pinjaman_pendidikan', 'Pinjaman.id_pinjaman', '=', 'detail_pinjaman_pendidikan.id_pinjaman')
            ->leftJoin('Agunan', 'Pinjaman.id_agunan', '=', 'Agunan.id_agunan')
            ->where('Pinjaman.id_produk', 6)
            ->where('status', 'Belum Selesai')
            ->select('Pinjaman.*', 'detail_pinjaman_pendidikan.jenjang_pendidikan', 'detail_pinjaman_pendidikan.institusi_pendidikan', 'Agunan.jenis_agunan', 'Agunan.nama_pemilik_agunan', 'Agunan.jenis_pengikat', 'Agunan.nilai_pengikatan', 'Agunan.keterangan')
            ->get(); 
            
        $pinjamankta = Pinjaman::leftJoin('detail_pinjaman_kta', 'Pinjaman.id_pinjaman', '=', 'detail_pinjaman_kta.id_pinjaman')
            ->leftJoin('Agunan', 'Pinjaman.id_agunan', '=', 'Agunan.id_agunan')
            ->where('Pinjaman.id_produk', 7)
            ->where('status', 'Belum Selesai')
            ->select('Pinjaman.*', 'detail_pinjaman_kta.tujuan_penggunaan', 'Agunan.jenis_agunan', 'Agunan.nama_pemilik_agunan', 'Agunan.jenis_pengikat', 'Agunan.nilai_pengikatan', 'Agunan.keterangan')
            ->get(); 
        
        // Mengirim data pinjaman ke view
        return view('pages.pinjaman.index', compact('pinjaman','pinjamankpr','pinjamankendaraan','pinjamanmultiguna','pinjamaninvestasi','pinjamanpendidikan','pinjamankta'));
    }

    public function selesai()
    {
        // Mengambil data pinjaman dari database
        $pinjaman = Pinjaman::leftJoin('detail_pinjaman_kur', 'Pinjaman.id_pinjaman', '=', 'detail_pinjaman_kur.id_pinjaman')
            ->leftJoin('Agunan', 'Pinjaman.id_agunan', '=', 'Agunan.id_agunan')
            ->where('Pinjaman.id_produk', 1) // Menambahkan kriteria where untuk id_produk = 1
            ->where('status', 'Selesai')
            ->select('Pinjaman.*', 'detail_pinjaman_kur.jenis_usaha', 'Agunan.jenis_agunan', 'Agunan.nama_pemilik_agunan', 'Agunan.jenis_pengikat', 'Agunan.nilai_pengikatan', 'Agunan.keterangan')
            ->get();
        
        $pinjamankpr = Pinjaman::leftJoin('detail_pinjaman_kpr', 'Pinjaman.id_pinjaman', '=', 'detail_pinjaman_kpr.id_pinjaman')
            ->leftJoin('Agunan', 'Pinjaman.id_agunan', '=', 'Agunan.id_agunan')
            ->where('Pinjaman.id_produk', 2)
            ->where('status', 'Selesai')
            ->select('Pinjaman.*', 'detail_pinjaman_kpr.tipe_rumah', 'detail_pinjaman_kpr.alamat_rumah', 'Agunan.jenis_agunan', 'Agunan.nama_pemilik_agunan', 'Agunan.jenis_pengikat', 'Agunan.nilai_pengikatan', 'Agunan.keterangan')
            ->get();    

        $pinjamankendaraan = Pinjaman::leftJoin('detail_pinjaman_kendaraan', 'Pinjaman.id_pinjaman', '=', 'detail_pinjaman_kendaraan.id_pinjaman')
            ->leftJoin('Agunan', 'Pinjaman.id_agunan', '=', 'Agunan.id_agunan')
            ->where('Pinjaman.id_produk', 3)
            ->where('status', 'Selesai')
            ->select('Pinjaman.*', 'detail_pinjaman_kendaraan.tipe_kendaraan', 'detail_pinjaman_kendaraan.merk_kendaraan', 'detail_pinjaman_kendaraan.tahun_pembuatan', 'Agunan.jenis_agunan', 'Agunan.nama_pemilik_agunan', 'Agunan.jenis_pengikat', 'Agunan.nilai_pengikatan', 'Agunan.keterangan')
            ->get(); 
            
        $pinjamanmultiguna = Pinjaman::leftJoin('detail_pinjaman_multiguna', 'Pinjaman.id_pinjaman', '=', 'detail_pinjaman_multiguna.id_pinjaman')
            ->leftJoin('Agunan', 'Pinjaman.id_agunan', '=', 'Agunan.id_agunan')
            ->where('Pinjaman.id_produk', 4)
            ->where('status', 'Selesai')
            ->select('Pinjaman.*', 'detail_pinjaman_multiguna.keperluan', 'Agunan.jenis_agunan', 'Agunan.nama_pemilik_agunan', 'Agunan.jenis_pengikat', 'Agunan.nilai_pengikatan', 'Agunan.keterangan')
            ->get(); 
            
        $pinjamaninvestasi = Pinjaman::leftJoin('detail_pinjaman_investasi', 'Pinjaman.id_pinjaman', '=', 'detail_pinjaman_investasi.id_pinjaman')
            ->leftJoin('Agunan', 'Pinjaman.id_agunan', '=', 'Agunan.id_agunan')
            ->where('Pinjaman.id_produk', 5)
            ->where('status', 'Selesai')
            ->select('Pinjaman.*', 'detail_pinjaman_investasi.tujuan_investasi', 'Agunan.jenis_agunan', 'Agunan.nama_pemilik_agunan', 'Agunan.jenis_pengikat', 'Agunan.nilai_pengikatan', 'Agunan.keterangan')
            ->get();
          
        $pinjamanpendidikan = Pinjaman::leftJoin('detail_pinjaman_pendidikan', 'Pinjaman.id_pinjaman', '=', 'detail_pinjaman_pendidikan.id_pinjaman')
            ->leftJoin('Agunan', 'Pinjaman.id_agunan', '=', 'Agunan.id_agunan')
            ->where('Pinjaman.id_produk', 6)
            ->where('status', 'Selesai')
            ->select('Pinjaman.*', 'detail_pinjaman_pendidikan.jenjang_pendidikan', 'detail_pinjaman_pendidikan.institusi_pendidikan', 'Agunan.jenis_agunan', 'Agunan.nama_pemilik_agunan', 'Agunan.jenis_pengikat', 'Agunan.nilai_pengikatan', 'Agunan.keterangan')
            ->get(); 
            
        $pinjamankta = Pinjaman::leftJoin('detail_pinjaman_kta', 'Pinjaman.id_pinjaman', '=', 'detail_pinjaman_kta.id_pinjaman')
            ->leftJoin('Agunan', 'Pinjaman.id_agunan', '=', 'Agunan.id_agunan')
            ->where('Pinjaman.id_produk', 7)
            ->where('status', 'Selesai')
            ->select('Pinjaman.*', 'detail_pinjaman_kta.tujuan_penggunaan', 'Agunan.jenis_agunan', 'Agunan.nama_pemilik_agunan', 'Agunan.jenis_pengikat', 'Agunan.nilai_pengikatan', 'Agunan.keterangan')
            ->get(); 
        
        // Mengirim data pinjaman ke view
        return view('pages.pinjaman.selesai', compact('pinjaman','pinjamankpr','pinjamankendaraan','pinjamanmultiguna','pinjamaninvestasi','pinjamanpendidikan','pinjamankta'));
    }
    public function destroy($id_pinjaman)
{
    
    // Cari data pinjaman berdasarkan ID
    $pinjaman = Pinjaman::findOrFail($id_pinjaman);
    // Hapus data pinjaman
    $pinjaman->delete();

    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect()->route('pinjaman.index')->with('success', 'Data pinjaman berhasil dihapus.');
}

}

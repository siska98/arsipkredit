<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\DetailPinjamanKur;
use App\Models\DetailPinjamanKpr;
use App\Models\DetailPinjamanKendaraan;
use App\Models\DetailPinjamanInvestasi;
use App\Models\DetailPinjamanKta;
use App\Models\DetailPinjamanMultiguna;
use App\Models\DetailPinjamaPendidikan;
use App\Models\Agunan;
use App\Models\ProdukPinjaman;

class KreditController extends Controller
{
    public function create()
    {
        $produks = ProdukPinjaman::where('id_produk', 1)
        ->get();

        // dd($produks);
        return view('pages.input.form_kur', compact('produks'));
    }
    public function store(Request $request)
    {
        // dd($request);
        // Validasi data
        $request->validate([
            'jenis_usaha' => 'required',
            'nama_peminjam' => 'required',
            'jenis_agunan' => 'required',
            'nama_pemilik_agunan' => 'required',
            'nilai_pengikatan' => 'required',
            'keterangan' => 'nullable',
            'tanggal_pinjaman' => ['required', 'date', 'before_or_equal:today'],
        ]);
    
        try {
            $nilai_pengikatan1 = str_replace(['Rp.', '.'], '', $request->nilai_pengikatan);
            $agunan = new Agunan;
            $agunan->jenis_agunan = $request->jenis_agunan;
            $agunan->nama_pemilik_agunan = $request->nama_pemilik_agunan;
            $agunan->jenis_pengikat = "Akta Pemberian Hak Tanggungan";
            $agunan->nilai_pengikatan = $nilai_pengikatan1;
            $agunan->keterangan = $request->keterangan;
            $agunan->save();
    
            // Simpan data pinjaman
            $pinjaman = new Pinjaman;
            $pinjaman->id_produk = 1;
            $pinjaman->nama_peminjam = $request->nama_peminjam;
            $pinjaman->status = "Belum Selesai";
            $pinjaman->id_agunan = $agunan->id_agunan;
            $pinjaman->tanggal_pinjaman = $request->tanggal_pinjaman;
            $pinjaman->save();
    
            // Simpan data detail pinjaman KUR
            $detailKUR = new DetailPinjamanKur;
            $detailKUR->id_pinjaman = $pinjaman->id_pinjaman;
            $detailKUR->jenis_usaha = $request->jenis_usaha;
            $detailKUR->save();
    
            // Redirect ke halaman lain atau tampilkan pesan sukses
            return redirect()->route('input')->with('success', 'Data KUR berhasil disimpan.');
        } catch (\Exception $e) {
            // Tampilkan pesan gagal jika terjadi kesalahan
            return redirect()->route('tambah-kur')->with('error', 'Gagal menyimpan data KUR.');
        }
    }
    public function createkpr()
    {
        $produks = ProdukPinjaman::where('id_produk', 1)
        ->get();

        // dd($produks);
        return view('pages.input.form_kpr', compact('produks'));
    }
    public function storekpr(Request $request)
    {
        // dd($request);
        // Validasi data
        $request->validate([
            'tipe_rumah' => 'required',
            'alamat_rumah' => 'required',
            'nama_peminjam' => 'required',
            'jenis_agunan' => 'required',
            'nama_pemilik_agunan' => 'required',
            'nilai_pengikatan' => 'required',
            'keterangan' => 'nullable',
            'tanggal_pinjaman' => ['required', 'date', 'before_or_equal:today'],
        ]);
    
        try {
            $nilai_pengikatan1 = str_replace(['Rp.', '.'], '', $request->nilai_pengikatan);
            $agunan = new Agunan;
            $agunan->jenis_agunan = $request->jenis_agunan;
            $agunan->nama_pemilik_agunan = $request->nama_pemilik_agunan;
            $agunan->jenis_pengikat = "Akta Pemberian Hak Tanggungan";
            $agunan->nilai_pengikatan = $nilai_pengikatan1;
            $agunan->keterangan = $request->keterangan;
            $agunan->save();
    
            // Simpan data pinjaman
            $pinjaman = new Pinjaman;
            $pinjaman->id_produk = 2;
            $pinjaman->nama_peminjam = $request->nama_peminjam;
            $pinjaman->status = "Belum Selesai";
            $pinjaman->id_agunan = $agunan->id_agunan;
            $pinjaman->tanggal_pinjaman = $request->tanggal_pinjaman;
            $pinjaman->save();
    
            // Simpan data detail pinjaman KUR
            $detailKPR = new DetailPinjamanKpr;
            $detailKPR->id_pinjaman = $pinjaman->id_pinjaman;
            $detailKPR->tipe_rumah = $request->tipe_rumah;
            $detailKPR->alamat_rumah = $request->alamat_rumah;
            $detailKPR->save();
    
            // Redirect ke halaman lain atau tampilkan pesan sukses
            return redirect()->route('input')->with('success', 'Data KPR berhasil disimpan.');
        } catch (\Exception $e) {
            // Tampilkan pesan gagal jika terjadi kesalahan
            return redirect()->route('tambah-kpr')->with('error', 'Gagal menyimpan data KPR.');
        }
    }
    public function createkendaraan()
    {
        $produks = ProdukPinjaman::where('id_produk', 1)
        ->get();

        // dd($produks);
        return view('pages.input.form_kendaraan', compact('produks'));
    }
    public function storekendaraan(Request $request)
    {
        // dd($request);
        // Validasi data
        $request->validate([	
            'tipe_kendaraan' => 'required',
            'merk_kendaraan' => 'required',
            'tahun_pembuatan' => 'required',
            'nama_peminjam' => 'required',
            'jenis_agunan' => 'required',
            'nama_pemilik_agunan' => 'required',
            'nilai_pengikatan' => 'required',
            'keterangan' => 'nullable',
            'tanggal_pinjaman' => ['required', 'date', 'before_or_equal:today'],
        ]);
    
        try {
            $nilai_pengikatan1 = str_replace(['Rp.', '.'], '', $request->nilai_pengikatan);
            $agunan = new Agunan;
            $agunan->jenis_agunan = $request->jenis_agunan;
            $agunan->nama_pemilik_agunan = $request->nama_pemilik_agunan;
            $agunan->jenis_pengikat = "Akta Pemberian Hak Tanggungan";
            $agunan->nilai_pengikatan = $nilai_pengikatan1;
            $agunan->keterangan = $request->keterangan;
            $agunan->save();
    
            // Simpan data pinjaman
            $pinjaman = new Pinjaman;
            $pinjaman->id_produk = 3;
            $pinjaman->nama_peminjam = $request->nama_peminjam;
            $pinjaman->status = "Belum Selesai";
            $pinjaman->id_agunan = $agunan->id_agunan;
            $pinjaman->tanggal_pinjaman = $request->tanggal_pinjaman;
            $pinjaman->save();
    
            // Simpan data detail pinjaman KUR
            $detailKendaraan = new DetailPinjamanKendaraan;
            $detailKendaraan->id_pinjaman = $pinjaman->id_pinjaman;
            $detailKendaraan->tipe_kendaraan = $request->tipe_kendaraan;
            $detailKendaraan->merk_kendaraan = $request->merk_kendaraan;
            $detailKendaraan->tahun_pembuatan = $request->tahun_pembuatan;
            $detailKendaraan->save();
    
            // Redirect ke halaman lain atau tampilkan pesan sukses
            return redirect()->route('input')->with('success', 'Data Kendaraan berhasil disimpan.');
        } catch (\Exception $e) {
            // Tampilkan pesan gagal jika terjadi kesalahan
            return redirect()->route('tambah-kendaraan')->with('error', 'Gagal menyimpan data Kendaraan.');
        }
    }
    public function createmultiguna()
    {
        $produks = ProdukPinjaman::where('id_produk', 1)
        ->get();

        // dd($produks);
        return view('pages.input.form_multiguna', compact('produks'));
    }
    public function storemultiguna(Request $request)
    {
        // dd($request);
        // Validasi data
        $request->validate([	
            'keperluhan' => 'required',
            'nama_peminjam' => 'required',
            'jenis_agunan' => 'required',
            'nama_pemilik_agunan' => 'required',
            'nilai_pengikatan' => 'required',
            'keterangan' => 'nullable',
            'tanggal_pinjaman' => ['required', 'date', 'before_or_equal:today'],
        ]);
    
        try {
            $nilai_pengikatan1 = str_replace(['Rp.', '.'], '', $request->nilai_pengikatan);
            $agunan = new Agunan;
            $agunan->jenis_agunan = $request->jenis_agunan;
            $agunan->nama_pemilik_agunan = $request->nama_pemilik_agunan;
            $agunan->jenis_pengikat = "Akta Pemberian Hak Tanggungan";
            $agunan->nilai_pengikatan = $nilai_pengikatan1;
            $agunan->keterangan = $request->keterangan;
            $agunan->save();
    
            // Simpan data pinjaman
            $pinjaman = new Pinjaman;
            $pinjaman->id_produk = 4;
            $pinjaman->nama_peminjam = $request->nama_peminjam;
            $pinjaman->status = "Belum Selesai";
            $pinjaman->id_agunan = $agunan->id_agunan;
            $pinjaman->tanggal_pinjaman = $request->tanggal_pinjaman;
            $pinjaman->save();
    
            // Simpan data detail pinjaman KUR
            $detailMultiguna = new DetailPinjamanMultiguna;
            $detailMultiguna->id_pinjaman = $pinjaman->id_pinjaman;
            $detailMultiguna->keperluhan = $request->keperluhan;
            $detailMultiguna->save();
    
            // Redirect ke halaman lain atau tampilkan pesan sukses
            return redirect()->route('input')->with('success', 'Data Multiguna berhasil disimpan.');
        } catch (\Exception $e) {
            // Tampilkan pesan gagal jika terjadi kesalahan
            return redirect()->route('tambah-multiguna')->with('error', 'Gagal menyimpan data Kredit Multiguna.');
        }
    }
    public function createinvestasi()
    {
        $produks = ProdukPinjaman::where('id_produk', 1)
        ->get();

        // dd($produks);
        return view('pages.input.form_investasi', compact('produks'));
    }
    public function storeinvestasi(Request $request)
    {
        // dd($request);
        // Validasi data
        $request->validate([	
            'tujuan_investasi' => 'required',
            'nama_peminjam' => 'required',
            'jenis_agunan' => 'required',
            'nama_pemilik_agunan' => 'required',
            'nilai_pengikatan' => 'required',
            'keterangan' => 'nullable',
            'tanggal_pinjaman' => ['required', 'date', 'before_or_equal:today'],
        ]);
    
        try {
            $nilai_pengikatan1 = str_replace(['Rp.', '.'], '', $request->nilai_pengikatan);
            $agunan = new Agunan;
            $agunan->jenis_agunan = $request->jenis_agunan;
            $agunan->nama_pemilik_agunan = $request->nama_pemilik_agunan;
            $agunan->jenis_pengikat = "Akta Pemberian Hak Tanggungan";
            $agunan->nilai_pengikatan = $nilai_pengikatan1;
            $agunan->keterangan = $request->keterangan;
            $agunan->save();
    
            // Simpan data pinjaman
            $pinjaman = new Pinjaman;
            $pinjaman->id_produk = 5;
            $pinjaman->nama_peminjam = $request->nama_peminjam;
            $pinjaman->status = "Belum Selesai";
            $pinjaman->id_agunan = $agunan->id_agunan;
            $pinjaman->tanggal_pinjaman = $request->tanggal_pinjaman;
            $pinjaman->save();
    
            // Simpan data detail pinjaman KUR
            $detailInvestasi = new DetailPinjamanInvestasi;
            $detailInvestasi->id_pinjaman = $pinjaman->id_pinjaman;
            $detailInvestasi->tujuan_investasi = $request->tujuan_investasi;
            $detailInvestasi->save();
    
            // Redirect ke halaman lain atau tampilkan pesan sukses
            return redirect()->route('input')->with('success', 'Data Investasi berhasil disimpan.');
        } catch (\Exception $e) {
            // Tampilkan pesan gagal jika terjadi kesalahan
            return redirect()->route('tambah-investasi')->with('error', 'Gagal menyimpan data Investasi.');
        }
    }
    public function creatependidikan()
    {
        $produks = ProdukPinjaman::where('id_produk', 6)
        ->get();

        // dd($produks);
        return view('pages.input.form_pendidikan', compact('produks'));
    }
    public function storependidikan(Request $request)
    {
        // dd($request);
        // Validasi data
        $request->validate([	
            'jenjang_pendidikan' => 'required',
            'institusi_pendidikan' => 'required',
            'nama_peminjam' => 'required',
            'jenis_agunan' => 'required',
            'nama_pemilik_agunan' => 'required',
            'nilai_pengikatan' => 'required',
            'keterangan' => 'nullable',
            'tanggal_pinjaman' => ['required', 'date', 'before_or_equal:today'],
        ]);
    
        try {
            $nilai_pengikatan1 = str_replace(['Rp.', '.'], '', $request->nilai_pengikatan);
            $agunan = new Agunan;
            $agunan->jenis_agunan = $request->jenis_agunan;
            $agunan->nama_pemilik_agunan = $request->nama_pemilik_agunan;
            $agunan->jenis_pengikat = "Akta Pemberian Hak Tanggungan";
            $agunan->nilai_pengikatan = $nilai_pengikatan1;
            $agunan->keterangan = $request->keterangan;
            $agunan->save();
    
            // Simpan data pinjaman
            $pinjaman = new Pinjaman;
            $pinjaman->id_produk = 6;
            $pinjaman->nama_peminjam = $request->nama_peminjam;
            $pinjaman->status = "Belum Selesai";
            $pinjaman->id_agunan = $agunan->id_agunan;
            $pinjaman->tanggal_pinjaman = $request->tanggal_pinjaman;
            $pinjaman->save();
    
            // Simpan data detail pinjaman KUR
            $detailPendidikan = new DetailPinjamanPendidikan;
            $detailPendidikan->id_pinjaman = $pinjaman->id_pinjaman;
            $detailPendidikan->jenjang_pendidikan = $request->jenjang_pendidikan;
            $detailPendidikan->institusi_pendidikan = $request->institusi_pendidikan;
            $detailPendidikan->save();
    
            // Redirect ke halaman lain atau tampilkan pesan sukses
            return redirect()->route('input')->with('success', 'Data Pendidikan berhasil disimpan.');
        } catch (\Exception $e) {
            // Tampilkan pesan gagal jika terjadi kesalahan
            return redirect()->route('tambah-pendidikan')->with('error', 'Gagal menyimpan data Pendidikan.');
        }
    }
    public function createkta()
    {
        $produks = ProdukPinjaman::where('id_produk', 1)
        ->get();

        // dd($produks);
        return view('pages.input.form_kta', compact('produks'));
    }
    public function storekta(Request $request)
    {
        // dd($request);
        // Validasi data
        $request->validate([	
            'tujuan_penggunaan' => 'required',
            'nama_peminjam' => 'required',
            'jenis_agunan' => 'required',
            'nama_pemilik_agunan' => 'required',
            'nilai_pengikatan' => 'required',
            'keterangan' => 'nullable',
            'tanggal_pinjaman' => ['required', 'date', 'before_or_equal:today'],
        ]);
    
        try {
            $nilai_pengikatan1 = str_replace(['Rp.', '.'], '', $request->nilai_pengikatan);
            $agunan = new Agunan;
            $agunan->jenis_agunan = $request->jenis_agunan;
            $agunan->nama_pemilik_agunan = $request->nama_pemilik_agunan;
            $agunan->jenis_pengikat = "Akta Pemberian Hak Tanggungan";
            $agunan->nilai_pengikatan = $nilai_pengikatan1;
            $agunan->keterangan = $request->keterangan;
            $agunan->save();
    
            // Simpan data pinjaman
            $pinjaman = new Pinjaman;
            $pinjaman->id_produk = 7;
            $pinjaman->nama_peminjam = $request->nama_peminjam;
            $pinjaman->status = "Belum Selesai";
            $pinjaman->id_agunan = $agunan->id_agunan;
            $pinjaman->tanggal_pinjaman = $request->tanggal_pinjaman;
            $pinjaman->save();
    
            // Simpan data detail pinjaman KUR
            $detailKta = new DetailPinjamanKta;
            $detailKta->id_pinjaman = $pinjaman->id_pinjaman;
            $detailKta->tujuan_penggunaan	 = $request->tujuan_penggunaan	;
            $detailKta->save();
    
            // Redirect ke halaman lain atau tampilkan pesan sukses
            return redirect()->route('input')->with('success', 'Data KTA berhasil disimpan.');
        } catch (\Exception $e) {
            // Tampilkan pesan gagal jika terjadi kesalahan
            return redirect()->route('tambah-kta')->with('error', 'Gagal menyimpan data KTA.');
        }
    }
}

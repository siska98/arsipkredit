<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\DetailPinjaanKur;
use App\Models\DetailPinjaanKpr;
use App\Models\DetailPinjaanKendaraan;
use App\Models\DetailPinjaanInvestasi;
use App\Models\DetailPinjaanKta;
use App\Models\DetailPinjaanMultiguna;
use App\Models\DetailPinjaanPendidikan;
use App\Models\Agunan;

class DetailController extends Controller
{
    public function showDetail($id_pinjaman)
{
    $data = Pinjaman::with('agunan','kur')
    ->find($id_pinjaman);
    // dd($data);
    return view('pages.pinjaman.detail', compact('data'));
}
public function markAsFinished($id_pinjaman)
    {
        $data = Pinjaman::find($id_pinjaman);
        if ($data) {
            $data->status = "Selesai"; // Ubah status menjadi selesai (false)
            $data->selesai_pinjaman = now(); // Ubah status menjadi selesai (false)
            $data->save();
        }
        return redirect()->back()->with('success', 'Status berhasil diubah menjadi Selesai');
    }
    public function showDetailInvestasi($id_pinjaman)
{
    $data = Pinjaman::with('agunan','investasi')
    ->find($id_pinjaman);
    // dd($data);
    return view('pages.pinjaman.detailinvestasi', compact('data'));
}
public function markAsFinished1($id_pinjaman)
    {
        $data = Pinjaman::find($id_pinjaman);
        if ($data) {
            $data->status = "Selesai"; // Ubah status menjadi selesai (false)
            $data->selesai_pinjaman = now(); // Ubah status menjadi selesai (false)
            $data->save();
        }
        return redirect()->back()->with('success', 'Status berhasil diubah menjadi Selesai');
    }
    public function showDetailKendaraan($id_pinjaman)
{
    $data = Pinjaman::with('agunan','kendaraan')
    ->find($id_pinjaman);
    // dd($data);
    return view('pages.pinjaman.detailkendaraan', compact('data'));
}
public function markAsFinished2($id_pinjaman)
    {
        $data = Pinjaman::find($id_pinjaman);
        if ($data) {
            $data->status = "Selesai"; // Ubah status menjadi selesai (false)
            $data->selesai_pinjaman = now(); // Ubah status menjadi selesai (false)
            $data->save();
        }
        return redirect()->back()->with('success', 'Status berhasil diubah menjadi Selesai');
    }
    public function showDetailKpr($id_pinjaman)
{
    $data = Pinjaman::with('agunan','kpr')
    ->find($id_pinjaman);
    // dd($data);
    return view('pages.pinjaman.detailkpr', compact('data'));
}
public function markAsFinished3($id_pinjaman)
    {
        $data = Pinjaman::find($id_pinjaman);
        if ($data) {
            $data->status = "Selesai"; // Ubah status menjadi selesai (false)
            $data->selesai_pinjaman = now(); // Ubah status menjadi selesai (false)
            $data->save();
        }
        return redirect()->back()->with('success', 'Status berhasil diubah menjadi Selesai');
    }
    public function showDetailKta($id_pinjaman)
{
    $data = Pinjaman::with('agunan','kta')
    ->find($id_pinjaman);
    // dd($data);
    return view('pages.pinjaman.detailkta', compact('data'));
}
public function markAsFinished4($id_pinjaman)
    {
        $data = Pinjaman::find($id_pinjaman);
        if ($data) {
            $data->status = "Selesai"; // Ubah status menjadi selesai (false)
            $data->selesai_pinjaman = now(); // Ubah status menjadi selesai (false)
            $data->save();
        }
        return redirect()->back()->with('success', 'Status berhasil diubah menjadi Selesai');
    }
    public function showDetailMultiguna($id_pinjaman)
{
    $data = Pinjaman::with('agunan','multiguna')
    ->find($id_pinjaman);
    // dd($data);
    return view('pages.pinjaman.detailmultiguna', compact('data'));
}
public function markAsFinished5($id_pinjaman)
    {
        $data = Pinjaman::find($id_pinjaman);
        if ($data) {
            $data->status = "Selesai"; // Ubah status menjadi selesai (false)
            $data->selesai_pinjaman = now(); // Ubah status menjadi selesai (false)
            $data->save();
        }
        return redirect()->back()->with('success', 'Status berhasil diubah menjadi Selesai');
    }
    public function showDetailPendidikan($id_pinjaman)
{
    $data = Pinjaman::with('agunan','pendidikan')
    ->find($id_pinjaman);
    // dd($data);
    return view('pages.pinjaman.detailpendidikan', compact('data'));
}
public function markAsFinished6($id_pinjaman)
    {
        $data = Pinjaman::find($id_pinjaman);
        if ($data) {
            $data->status = "Selesai"; // Ubah status menjadi selesai (false)
            $data->selesai_pinjaman = now(); // Ubah status menjadi selesai (false)
            $data->save();
        }
        return redirect()->back()->with('success', 'Status berhasil diubah menjadi Selesai');
    }
}

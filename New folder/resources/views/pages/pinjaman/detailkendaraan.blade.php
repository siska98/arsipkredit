@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Detail Peminjam</h4>
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr>
              <th>Nama Produk</th>
              <td>Kredit Kendaraan</td>
            </tr>
            <tr>
              <th>Nama Peminjam</th>
              <td>{{ $data->nama_peminjam }}</td>
            </tr>
            <tr>
              <th>Tipe Kendaraan</th>
              <td>{{ $data->kendaraan->tipe_kendaraan }}</td>
            </tr>
            <tr>
              <th>Merk Kendaraan</th>
              <td>{{ $data->kendaraan->merk_kendaraan }}</td>
            </tr>
            <tr>
              <th>Tahun Pembuatan</th>
              <td>{{ $data->kendaraan->tahun_pembuatan }}</td>
            </tr>
            <tr>
              <th>Jenis Agunan</th>
              <td>{{ $data->agunan->jenis_agunan }}</td>
            </tr>
            <tr>
              <th>Nama Pemilik Agunan</th>
              <td>{{ $data->agunan->nama_pemilik_agunan }}</td>
            </tr>
            <tr>
              <th>Jenis Pengikat</th>
              <td>{{ $data->agunan->jenis_pengikat }}</td>
            </tr>
            <tr>
              <th>Nilai Pengikatan</th>
              <td>{{ $data->agunan->nilai_pengikatan }}</td>
            </tr>
            @if($data->status == 'Belum Selesai')
            <tr>
              <th>Tanggal Pinjaman</th>
              <td>{{ $data->tanggal_pinjaman }}</td>
            </tr>
            @else($data->status == 'Selesai')
            <tr>
              <th>Tanggal Pinjaman</th>
              <td>{{ $data->tanggal_pinjaman }}</td>
            </tr>
            <tr>
              <th>Selesai Pinjaman</th>
              <td>{{ $data->selesai_pinjaman }}</td>
            </tr>
            @endif
            <tr>
              <th>Keterangan</th>
              <td>{{ $data->agunan->keterangan }}</td>
            </tr>
            <tr>
              <th>Status</th>
              <td>{{ $data->status }}</td>
            </tr>
          </table>
        </div>
        <div class="d-flex justify-content-between mt-3">
          <a href="{{ route('pinjaman.index') }}" class="btn btn-danger">Kembali</a>
          @if($data->status)
          <form action="{{ route('markAsFinished', $data->id_pinjaman) }}" method="POST">
            {{ @csrf_field() }}
            <button type="submit" class="btn btn-success">Sudah Selesai</button>
          </form>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

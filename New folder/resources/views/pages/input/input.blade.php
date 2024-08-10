@extends('layout.master')

@section('content')
@if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif

        @if(session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
        @endif
<div class="row">
  <div class="col-lg-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-center align-items-center mb-3">
          <i class="mdi mdi-currency-usd mdi-48px text-primary"></i>
        </div>
        <h4 class="card-title text-center mb-2">Kredit Usaha Rakyat (KUR)</h4>
        <p class="card-description text-center">
          Pinjaman untuk usaha kecil dan mikro dengan tingkat bunga yang rendah.
        </p>
        <div class="d-flex justify-content-center">
          <a href="{{ route('tambah-kur') }}" class="btn btn-primary btn-sm">
            <i class="mdi mdi-plus"></i> Tambah
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-center align-items-center mb-3">
          <i class="mdi mdi-home mdi-48px text-primary"></i>
        </div>
        <h4 class="card-title text-center mb-2">Kredit Pemilikan Rumah (KPR)</h4>
        <p class="card-description text-center">
          Pinjaman untuk membeli atau membangun rumah dengan jangka waktu dan suku bunga yang bervariasi.
        </p>
        <div class="d-flex justify-content-center">
          <a href="{{ route('tambah-kpr') }}" class="btn btn-primary btn-sm">
            <i class="mdi mdi-plus"></i> Tambah
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-center align-items-center mb-3">
          <i class="mdi mdi-car mdi-48px text-primary"></i>
        </div>
        <h4 class="card-title text-center mb-2">Kredit Kendaraan Bermotor</h4>
        <p class="card-description text-center">
          Pinjaman untuk pembelian kendaraan bermotor seperti mobil atau motor.
        </p>
        <div class="d-flex justify-content-center">
          <a href="{{ route('tambah-kendaraan') }}" class="btn btn-primary btn-sm">
            <i class="mdi mdi-plus"></i> Tambah
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-center align-items-center mb-3">
          <i class="mdi mdi-hammer-screwdriver mdi-48px text-primary"></i>
        </div>
        <h4 class="card-title text-center mb-2">Kredit Multiguna</h4>
        <p class="card-description text-center">
          Pinjaman yang dapat digunakan untuk berbagai keperluan seperti renovasi rumah, pendidikan, atau kebutuhan konsumtif lainnya.
        </p>
        <div class="d-flex justify-content-center">
          <a href="{{ route('tambah-multiguna') }}" class="btn btn-primary btn-sm">
            <i class="mdi mdi-plus"></i> Tambah
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-center align-items-center mb-3">
          <i class="mdi mdi-chart-line mdi-48px text-primary"></i>
        </div>
        <h4 class="card-title text-center mb-2">Kredit Investasi</h4>
        <p class="card-description text-center">
          Pinjaman untuk investasi dalam bisnis atau proyek tertentu.
        </p>
        <div class="d-flex justify-content-center">
          <a href="{{ route('tambah-investasi') }}" class="btn btn-primary btn-sm">
            <i class="mdi mdi-plus"></i> Tambah
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-center align-items-center mb-3">
          <i class="mdi mdi-school mdi-48px text-primary"></i>
        </div>
        <h4 class="card-title text-center mb-2">Kredit Pendidikan</h4>
        <p class="card-description text-center">
          Pinjaman untuk pendidikan tinggi atau pelatihan lainnya.
        </p>
        <div class="d-flex justify-content-center">
          <a href="{{ route('tambah-pendidikan') }}" class="btn btn-primary btn-sm">
            <i class="mdi mdi-plus"></i> Tambah
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-center align-items-center mb-3">
          <i class="mdi mdi-account mdi-48px text-primary"></i>
        </div>
        <h4 class="card-title text-center mb-2">Kredit Tanpa Agunan (KTA)</h4>
        <p class="card-description text-center">
          Pinjaman yang tidak memerlukan jaminan dan dapat digunakan untuk berbagai keperluan pribadi.
        </p>
        <div class="d-flex justify-content-center">
          <a href="{{ route('tambah-kta') }}" class="btn btn-primary btn-sm">
            <i class="mdi mdi-plus"></i> Tambah
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

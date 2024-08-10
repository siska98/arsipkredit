@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
<div class="row">
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-receipt text-warning icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Jumlah Kreditor</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{ $kredit }}</h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-poll-box text-success icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Belum Selesai</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{ $kredit1 }}</h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-account-box-multiple text-info icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Sudah Selesai</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{ $kredit2 }}</h3>
            </div>
          </div>
        </div>
        <p class="text-muted mt-3 mb-0 text-left text-md-center text-xl-left">
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6 col-xl-5 grid-margin stretch-card">
    <div class="card card-revenue">
      <div class="card-body d-flex align-items-center">
        <div class="d-flex flex-grow">
          <div class="mr-auto">
            <p class="text-white"> Total Transaksi </p>
            <p class="highlight-text mb-0 text-white">Rp.{{ number_format($total, 0, ',', '.') }}</p>
            <div class="badge badge-pill"> {{ date('Y') }} </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-7 grid-margin stretch-card">
    <div class="card card-revenue-table">
      <div class="card-body">
        <div class="revenue-item d-flex">
          <div class="revenue-desc">
            <h6>Total Kredit Belum Selesai</h6>
          </div>
          <div class="revenue-amount">
            <p class="text-primary">Rp.{{ number_format($total1, 0, ',', '.') }}</p>
          </div>
        </div>
        <div class="revenue-item d-flex">
          <div class="revenue-desc">
            <h6>Total Kredit Sudah Selesai</h6>
          </div>
          <div class="revenue-amount">
            <p class="text-primary">Rp.{{ number_format($total2, 0, ',', '.') }} </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">History Kredit Per Bulan</h4>
        <div class="table-responsive">
          <table class="table table-striped">
          <thead>
              <tr>
                <th> No </th>
                <th> Tahun </th>
                <th> Bulan </th>
                <th> Total Nilai Pengikatan </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($monthlyData as $index => $data)
              <tr>
                <td class="font-weight-medium"> {{ $index + 1 }} </td>
                <td> {{ $data['year'] }} </td>
                <td> {{ $data['month'] }} </td>
                <td> Rp. {{ number_format($data['total_nilai_pengikatan'], 0, ',', '.') }} </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Produk Pinjaman</h4>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th> No </th>
                <th> Nama Produk </th>
                <th> Percentage </th>
                <th> Total Nilai Pengikatan </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($produk as $data)
              <tr>
                <td class="font-weight-medium"> {{ $data['no'] }} </td>
                <td> {{ $data['nama_produk'] }} </td>
                <td><div class="progress">
                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: {{ number_format($data['percentage'], 2) }}%" aria-valuenow="{{ number_format($data['percentage'], 2) }}%" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><p>{{ number_format($data['percentage']) }}%</p></td>
                <td> Rp. {{ number_format($data['total_nilai_pengikatan'], 0, ',', '.') }} </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/assets/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/assets/js/dashboard.js') !!}
@endpush
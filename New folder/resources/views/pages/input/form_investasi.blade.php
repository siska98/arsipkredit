@extends('layout.master')

@section('content')
<!-- plugin css -->
<link media="all" type="text/css" rel="stylesheet" href="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/@mdi/font/css/materialdesignicons.min.css">
<link media="all" type="text/css" rel="stylesheet" href="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
<!-- end plugin css -->

<link media="all" type="text/css" rel="stylesheet" href="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/icheck/skins/all.css">

<!-- common css -->
<link media="all" type="text/css" rel="stylesheet" href="https://demo.bootstrapdash.com/star-laravel-pro/template/css/app.css">

<div class="row">
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <!-- Display Flash Messages -->
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

        <h4 class="card-title">Form Kredit Investasi</h4>

        <form class="forms-sample" method="POST" action="{{ route('simpan-investasi') }}">
          {{ @csrf_field() }}
          <div class="form-group">
            <label for="tujuan_investasi">Tujuan Investasi</label>
            <input type="text" class="form-control" id="tujuan_investasi" name="tujuan_investasi" placeholder="Tujuan Investasi">
          </div>
          <div class="form-group">
            <label for="nama_peminjam">Nama Peminjam</label>
            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" placeholder="Nama Peminjam">
          </div>
          <div class="form-group">
            <label for="jenis_agunan">Jenis Agunan</label>
            <select class="form-control border-primary" id="jenis_agunan" name="jenis_agunan">
                <option value="SHM">Surat Hak Milik</option>
                <option value="SHT">Sertifikat Hak Tanggungan</option>
                <option value="AJB">Akta Jual Beli</option>
                <option value="KGB">Kredit Guna Bakti</option>
            </select>
          </div>
          <div class="form-group">
            <label for="nama_pemilik_agunan">Nama Pemilik Agunan</label>
            <input type="text" class="form-control" id="nama_pemilik_agunan" name="nama_pemilik_agunan" placeholder="Nama Pemilik Agunan">
          </div>
          <div class="form-group">
            <label for="nilai_pengikatan">Nilai Pengikatan</label>
            <input type="text" class="form-control" id="nilai_pengikatan" name="nilai_pengikatan" placeholder="Nilai Pengikatan">
          </div>
          <div class="form-group">
            <label for="tanggal_pinjaman">Tanggal Pinjaman</label>
            <input type="date" class="form-control" id="tanggal_pinjaman" name="tanggal_pinjaman" placeholder="Nilai Pengikatan"  max="{{ date('Y-m-d') }}">
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="4" placeholder="Keterangan"></textarea>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Simpan</button>
          <a href="{{ route('input') }}" class="btn btn-danger">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    function formatRupiah(angka, prefix) {
    // Remove non-numeric characters
    var numericValue = angka.replace(/\D/g, '');
    
    var number_string = numericValue.toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // Tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

document.addEventListener('DOMContentLoaded', function () {
    var nilaiPengikatan = document.getElementById('nilai_pengikatan');
    nilaiPengikatan.addEventListener('keyup', function (e) {
        // Assign formatted value after removing non-numeric characters
        nilaiPengikatan.value = formatRupiah(this.value.replace(/\D/g, ''), 'Rp. ');
    });
});
</script>

<script src="https://demo.bootstrapdash.com/star-laravel-pro/template/js/app.js"></script>
<script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<!-- end base js -->

<!-- plugin js -->
<script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/plugins/icheck/icheck.min.js"></script>
<!-- end plugin js -->

<!-- common js -->
<script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/off-canvas.js"></script>
<script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/hoverable-collapse.js"></script>
<script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/misc.js"></script>
<script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/settings.js"></script>
<script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/todolist.js"></script>
<!-- end common js -->

<script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/file-upload.js"></script>
<script src="https://demo.bootstrapdash.com/star-laravel-pro/template/assets/js/iCheck.js"></script>
@endsection

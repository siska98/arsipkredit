@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Peminjam</h4>
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active bg-success" id="kur-tab" data-toggle="tab" href="#kur" role="tab" aria-controls="kur" aria-selected="true">Kredit Usaha Rakyat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-success" id="kpr-tab" data-toggle="tab" href="#kpr" role="tab" aria-controls="kpr" aria-selected="false">Kredit Pemilikan Rumah</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-success" id="kendaraan-tab" data-toggle="tab" href="#kendaraan" role="tab" aria-controls="kendaraan" aria-selected="false">Kredit Kendaraan Bermotor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-success" id="multiguna-tab" data-toggle="tab" href="#multiguna" role="tab" aria-controls="multiguna" aria-selected="false">Kredit Multiguna</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-success" id="investasi-tab" data-toggle="tab" href="#investasi" role="tab" aria-controls="investasi" aria-selected="false">Kredit Investasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-success" id="pendidikan-tab" data-toggle="tab" href="#pendidikan" role="tab" aria-controls="pendidikan" aria-selected="false">Kredit Pendidikan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-success" id="tanpa-agunan-tab" data-toggle="tab" href="#tanpa-agunan" role="tab" aria-controls="tanpa-agunan" aria-selected="false">Kredit Tanpa Agunan</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="kur" role="tabpanel" aria-labelledby="kur-tab">
            <div class="table-responsive">
              <table class="table table-striped">
                <!-- Isi tabel untuk Kredit Usaha Rakyat -->
                <thead>
              <tr>
                <th> No </th>
                <th> Nama Peminjam </th>
                <th> Jenis Usaha </th>
                <th> Jenis Agunan </th>
                <th> Status </th>
                <th> </th>
              </tr>
            </thead>
            <tbody>
              @foreach($pinjaman as $key => $data)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->nama_peminjam }}</td>
                <td>{{ $data->jenis_usaha ?? '-' }}</td>
                <td>{{ $data->jenis_agunan }}</td>
                <td>
                  @if($data->status)
                    Masih Berjalan
                  @else
                    -
                  @endif
                </td>
                <td>
                  <a href="{{ route('pinjaman.detail', $data->id_pinjaman) }}" class="btn btn-primary btn-sm">Detail</a>
                  <form action="{{ route('pinjaman.destroy', $data->id_pinjaman) }}" method="POST" style="display:inline;">
                  {{ @csrf_field() }}
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
                </td>
              </tr>
              @endforeach
            </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="kpr" role="tabpanel" aria-labelledby="kpr-tab">
            <div class="table-responsive">
              <table class="table table-striped">
              <thead>
              <tr>
                <th> No </th>
                <th> Nama Peminjam </th>
                <th> Tipe Rumah </th>
                <th> Alamat Rumah </th>
                <th> Jenis Agunan </th>
                <th> Status </th>
                <th> </th>
              </tr>
            </thead>
            <tbody>
              @foreach($pinjamankpr as $key => $data)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->nama_peminjam }}</td>
                <td>{{ $data->tipe_rumah ?? '-' }}</td>
                <td>{{ $data->alamat_rumah ?? '-' }}</td>
                <td>{{ $data->jenis_agunan }}</td>
                <td>
                  @if($data->status)
                    Masih Berjalan
                  @else
                    -
                  @endif
                </td>
                <td>
                  <a href="{{ route('pinjaman.detailkpr', $data->id_pinjaman) }}" class="btn btn-primary btn-sm">Detail</a>
                  <form action="{{ route('pinjaman.destroy', $data->id_pinjaman) }}" method="POST" style="display:inline;">
                  {{ @csrf_field() }}
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
                </td>
              </tr>
              @endforeach
            </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="kendaraan" role="tabpanel" aria-labelledby="kendaraan-tab">
            <div class="table-responsive">
              <table class="table table-striped"><thead>
              <thead>
              <tr>
                <th> No </th>
                <th> Nama Peminjam </th>
                <th> Tipe Kendaraan </th>
                <th> Merk Kendaraan </th>
                <th> Tahun Pembuatan </th>
                <th> Jenis Agunan </th>
                <th> Status </th>
                <th> </th>
              </tr>
            </thead>
            <tbody>
              @foreach($pinjamankendaraan as $key => $data)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->nama_peminjam }}</td>
                <td>{{ $data->tipe_kendaraan ?? '-' }}</td>
                <td>{{ $data->merk_kendaraan ?? '-' }}</td>
                <td>{{ $data->tahun_pembuatan ?? '-' }}</td>
                <td>{{ $data->jenis_agunan }}</td>
                <td>
                  @if($data->status)
                    Masih Berjalan
                  @else
                    -
                  @endif
                </td>
                <td>
                <a href="{{ route('pinjaman.detailkendaraan', $data->id_pinjaman) }}" class="btn btn-primary btn-sm">Detail</a>
                <form action="{{ route('pinjaman.destroy', $data->id_pinjaman) }}" method="POST" style="display:inline;">
                  {{ @csrf_field() }}
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
              </td>
              </tr>
              @endforeach
            </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="kpr" role="tabpanel" aria-labelledby="kpr-tab">
            <div class="table-responsive">
              <table class="table table-striped">
              
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="multiguna" role="tabpanel" aria-labelledby="multiguna-tab">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
              <tr>
                <th> No </th>
                <th> Nama Peminjam </th>
                <th> Keperluan </th>
                <th> Jenis Agunan </th>
                <th> Status </th>
                <th> </th>
              </tr>
            </thead>
            <tbody>
              @foreach($pinjamanmultiguna as $key => $data)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->nama_peminjam }}</td>
                <td>{{ $data->keperluan ?? '-' }}</td>
                <td>{{ $data->jenis_agunan }}</td>
                <td>
                  @if($data->status)
                    Masih Berjalan
                  @else
                    -
                  @endif
                </td>
                <td>
                <a href="{{ route('pinjaman.detailmultiguna', $data->id_pinjaman) }}" class="btn btn-primary btn-sm">Detail</a>
                <form action="{{ route('pinjaman.destroy', $data->id_pinjaman) }}" method="POST" style="display:inline;">
                  {{ @csrf_field() }}
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
              </td>
              </tr>
              @endforeach
            </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="investasi" role="tabpanel" aria-labelledby="investasi-tab">
            <div class="table-responsive">
              <table class="table table-striped">
              <thead>
              <tr>
                <th> No </th>
                <th> Nama Peminjam </th>
                <th> Tujuan Investasi </th>
                <th> Jenis Agunan </th>
                <th> Status </th>
                <th> </th>
              </tr>
            </thead>
            <tbody>
              @foreach($pinjamaninvestasi as $key => $data)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->nama_peminjam }}</td>
                <td>{{ $data->tujuan_investasi ?? '-' }}</td>
                <td>{{ $data->jenis_agunan }}</td>
                <td>
                  @if($data->status)
                    Masih Berjalan
                  @else
                    -
                  @endif
                </td>
                <td>
                <a href="{{ route('pinjaman.detailinvestasi', $data->id_pinjaman) }}" class="btn btn-primary btn-sm">Detail</a>
                <form action="{{ route('pinjaman.destroy', $data->id_pinjaman) }}" method="POST" style="display:inline;">
                  {{ @csrf_field() }}
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
              </td>
              </tr>
              @endforeach
            </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="pendidikan" role="tabpanel" aria-labelledby="pendidikan-tab">
            <div class="table-responsive">
              <table class="table table-striped">
              <thead>
              <tr>
                <th> No </th>
                <th> Nama Peminjam </th>
                <th> Jenjang Pendidikan </th>
                <th> Institusi Pendidikan </th>
                <th> Status </th>
                <th> </th>
              </tr>
            </thead>
            <tbody>
              @foreach($pinjamanpendidikan as $key => $data)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->nama_peminjam }}</td>
                <td>{{ $data->jenjang_pendidikan ?? '-' }}</td>
                <td>{{ $data->institusi_pendidikan ?? '-' }}</td>
                <td>{{ $data->jenis_agunan }}</td>
                <td>
                  @if($data->status)
                    Masih Berjalan
                  @else
                    -
                  @endif
                </td>
                <td>
                <a href="{{ route('pinjaman.detailpendidikan', $data->id_pinjaman) }}" class="btn btn-primary btn-sm">Detail</a>
                <form action="{{ route('pinjaman.destroy', $data->id_pinjaman) }}" method="POST" style="display:inline;">
                  {{ @csrf_field() }}
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
              </td>
              </tr>
              @endforeach
            </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="tanpa-agunan" role="tabpanel" aria-labelledby="tanpa-agunan-tab">
            <div class="table-responsive">
              <table class="table table-striped">
              <thead>
              <tr>
                <th> No </th>
                <th> Nama Peminjam </th>
                <th> Tujuan Penggunaan </th>
                <th> Jenis Agunan </th>
                <th> Status </th>
                <th> </th>
              </tr>
            </thead>
            <tbody>
              @foreach($pinjamankta as $key => $data)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->nama_peminjam }}</td>
                <td>{{ $data->tujuan_penggunaan ?? '-' }}</td>
                <td>{{ $data->jenis_agunan }}</td>
                <td>
                  @if($data->status)
                    Masih Berjalan
                  @else
                    -
                  @endif
                </td>
                <td>
                <a href="{{ route('pinjaman.detailkta', $data->id_pinjaman) }}" class="btn btn-primary btn-sm">Detail</a>
                <form action="{{ route('pinjaman.destroy', $data->id_pinjaman) }}" method="POST" style="display:inline;">
                  {{ @csrf_field() }}
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
              </td>
              </tr>
              @endforeach
            </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
@endpush

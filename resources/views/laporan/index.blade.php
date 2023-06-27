 @extends('layouts.template')
 @section('content')
 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="row mb-2">
            <div class="col-6 d-flex">
              <form action="/laporan/cetakpdf" method="post" target="_blank">
                  @csrf
                  <input type="hidden" name="awal" value="{{ request('tgl_awal') }}">
                  <input type="hidden" name="akhir" value="{{ request('tgl_akhir') }}">
                  <button type="submit" class="btn btn-danger mr-2">
                    <i class="fas fa-file-pdf mr-2"></i> Cetak PDF
                  </button>
              </form>
               <form action="/laporan/cetakexcel" method="post" target="_blank">
                  @csrf
                  <input type="hidden" name="awal" value="{{ request('tgl_awal') }}">
                  <input type="hidden" name="akhir" value="{{ request('tgl_akhir') }}">
                  <button type="submit" class="btn btn-success">
                    <i class="fas fa-file-excel mr-2"></i> Cetak Excel
                  </button>
              </form>
            </div>
            <div class="col-6 d-flex justify-content-end">
              <form action="/laporan" method="post" class="form-inline">
                  @csrf
                  <input type="date" name="tgl_awal" id="tgl_awal" class="form-control mr-2" value="{{ request('tgl_awal') }}" required>
                  <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control mr-2" value="{{ request('tgl_akhir') }}" required>
                  <button type="submit" class="btn btn-dark">
                    <i class="fas fa-filter"></i> Filter
                  </button>
                  <a href="/laporan" class="btn btn-info ml-2">Clear Filter</a>
              </form>
            </div>
          </div>
          <table class="table table-striped table-hover">
            <thead>
              <tr class="bg-dark text-light">
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Bulan Dibayar</th>
                <th>Tahun Dibayar</th>
                <th>Jumlah bayar</th>
                <th>Tanggal bayar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($pembayaran as $bayar)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $bayar->siswa->nama }}</td>
                <td>{{ $bayar->siswa->kelas->nama_kelas }}</td>
                <td>{{ $bayar->bulan->nama_bulan }}</td>
                <td>{{ $bayar->tahun_bayar }}</td>
                <td>Rp. {{number_format($bayar->jumlah, 2, ',', '.') }}</td>
                <td> {{ date_format(date_create($bayar->tgl_bayar), 'd-m-Y') }}</td>
                <td class="d-flex">
                 <a href="/pembayaran/{{ $bayar->id }}/print" class="btn btn-info text-light btn-sm ml-2" target="_blank">
                  <i class="fas fa-print"></i> Cetak Bukti
                 </a>
                 <form action="/pembayaran/{{ $bayar->id }}" method="post">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Yakin data ini akan dihapus?')">
                    <i class="fas fa-trash-alt">Hapus</i>
                  </button>
                 </form>
                </td>
              </tr>
               @endforeach
            </tbody>
          </table>
          <div class="row">
            <div class="col-12 d-flex justify-content-end">
              {{ $pembayaran->links() }}
            </div>
          </div>
          <hr>
        </div>
      </div>
   </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
 

 @endsection
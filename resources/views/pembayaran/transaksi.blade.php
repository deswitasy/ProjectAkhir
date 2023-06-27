 @extends('layouts.template')
 @section('content')
 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
    <div class="card p-3">
      <div class="row mb-4">
        <div class="col-6">
          <h4 class="text-primary">Biodata Siswa</h4>
        </div>
          <div class="col-6">
            <a href="/pembayaran" class="btn btn-outline-dark float-right">
              <i class="fas fa-undo"></i>Kembali
            </a>
        </div>
      </div>
       <div class="row d-flex align-items-center">
        <div class="col-3">
          <img src="/images/user.png" alt="" width="85%">
        </div>
        <div class="col-9">
          <table class="table table-striped text-dark">
            <tr>
              <td>NIS</td>
              <td>:</td>
              <td>{{ $siswa->nis}}</td>
            </tr>
             <tr>
              <td>Nama Siswa</td>
              <td>:</td>
              <td>{{ $siswa->nama}}</td>
            </tr>
             <tr>
              <td>Kelas</td>
              <td>:</td>
              <td>{{ $siswa->kelas->nama_kelas}}</td>
            </tr>
             <tr>
              <td>Jurusan</td>
              <td>:</td>
              <td>{{ $siswa->kelas->jurusan}}</td>
            </tr>
             <tr>
              <td>Tahun Ajaran</td>
              <td>:</td>
              <td>{{ $siswa->spp->tahun_spp}}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="card p-3">
      <h4 class="text-primary mb-3">Tagihan SPP Siswa</h4>
      <div class="row">
        <div class="col-6">
            <table class="table table-striped bg-dark text-light">
        <thead >
          <tr class="bg-info">
            <th>No</th>
            <th>Bulan</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($bulan1 as $b)    
          <tr>
            <td>{{$b->id}}</td>
            <td>{{$b->nama_bulan}}</td>
            <td class="text-warning">{{ in_array($b->id, $idBulan) ? 'LUNAS' : '' }}</td>
            <td>
                <a href="" class="btn btn-info btn-sm  {{ in_array($b->id, $idBulan) ? 'disabled' : ''}} tombolProses" data-toggle="modal" data-target="#transaksiModal" data-id="{{ $b->id}}">
                  <i class="fas fa-money-bill-alt"></i> Bayar  
                </a>      
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
        </div>
         <div class="col-6">
           <table class="table table-striped table-dark">
        <thead>
          <tr  class="bg-info">
            <th>No</th>
            <th>Bulan</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($bulan2 as $b)
              
          <tr>
            <td>{{$b->id}}</td>
            <td>{{$b->nama_bulan}}</td>
            <td class="text-warning">{{ in_array($b->id, $idBulan) ? 'LUNAS' : '' }}</td>
            <td>
                <a href="" class="btn btn-info btn-sm  {{ in_array($b->id, $idBulan) ? 'disabled' : ''}} tombolProses" data-toggle="modal" data-target="#transaksiModal" data-id="{{ $b->id }}">
                  <i class="fas fa-money-bill-alt"></i> Bayar  
                </a>      
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
        </div>
      </div>
     
    </div>
    <div class="card p-3">
      <h4 class="text-primary mb-3">Riwayat Pembayaran Siswa</h4>
      <table class="table table-hover table-striped">
        <thead>
          <tr class="bg-dark  text-light">
            <th>No</th>
            <th>Bulan Dibayar</th>
            <th>Tahun Dibayar</th>
            <th>Tanggal Pembayaran</th>
            <th>Jumlah Pembayaran</th>
          </tr>
        </thead>
        <tbody>
          @php
              $no =1;
          @endphp
          @foreach ($bayarSiswa as $byr)
          <tr>
            <td>{{ $no++}}</td>
            <td>{{ $byr->bulan->nama_bulan}}</td>
            <td>{{ $byr->tahun_bayar}}</td>
            <td>{{ $byr->tgl_bayar}}</td>
            <td>Rp. <span class="float-right"> {{ number_format($byr->jumlah, 2, ',', '.') }}</span>
            </td>
          </tr>
          @endforeach
          <tr class="bg-secondary text-light">
            <td colspan="4">Total Pembayaran</td>
            <td>Rp. <span class="float-right"> {{ number_format($totalBayar, 2, ',', '.') }}</span>
            </td>
          </tr>
           <tr class="bg-secondary text-light">
            <td colspan="4">Sisa Tunggakan</td>
            <td>Rp. <span class="float-right"> {{ number_format($siswa->spp->nominal - $totalBayar, 2, ',', '.') }}</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    
   </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
 <!-- Modal -->
  <div class="modal fade" id="transaksiModal" tabindex="-1" role="dialog" aria-labelledby="transaksiModalLabel"       aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-dark text-light text-center">
          <h5 class="modal-title" id="transaksiModalLabel">Konfirmasi Pembayaran SPP</h5>
        </div>
      <div class="modal-body">
        <p class="lead">Detail Pembayaran SPP</p>
        <table class="table table-striped ">
          <tr>
            <td>Nama Siswa</td>
            <td>:</td>
            <td> {{ $siswa->nama}}</td>
          </tr>
           <tr>
            <td>Tahun SPP</td>
            <td>:</td>
            <td id="tahunBayar">{{ $siswa->spp->tahun_spp}}</td>
          </tr>
           <tr>
            <td>Bulan Dibayar</td>
            <td>:</td>
            <td id="bulanBayar"></td>
          </tr>
          <tr>
            <td>Jumlah Dibayarkan</td>
            <td>:</td>
            <td>Rp. 250.000,00</td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="/pembayaran" method="post">
          @csrf
          <input type="hidden" name="id_bulan" id="id_bulan">
          <input type="hidden" name="id_siswa" id="id_siswa" value="{{ $siswa->id }}">
          <input type="hidden" name="id_spp" id="id_spp" value="{{ $siswa->id_spp }}">
          <input type="hidden" name="tahun_bayar" id="tahun_bayar">
        <button type="submit" class="btn btn-primary">Konfirmasi</button>
        </form>
      </div>
    </div>
  </div>
</div>
 @endsection

 @section('script')
    <script>
    $('.tombolProses').on('click', function(){
      const id = $(this).data('id')
      var tahun = $('#tahunBayar').html()
      var tahunArray = tahun.split('-')
      $.ajax({
        url: '/pembayaran/getbulan',
        data: {
          id: id
        },
        dataType: 'json',
        method: 'post',
        success: function(data) {
          $('#bulanBayar').html(data.nama_bulan)
          $('#id_bulan').val(id)
          if (id < 7) {
            $('#tahun_bayar').val(tahunArray[0])
          } else {
            $('#tahun_bayar').val(tahunArray[1]) 
          }
        }
      })
    })
    </script>
     
 @endsection
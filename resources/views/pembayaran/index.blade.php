 @extends('layouts.template')
 @section('content')
 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          
           @if (session('pembayaran'))
      <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        {{ session('pembayaran') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" >&times;</span>
        </button>
      </div>
      @endif
      <div class="card-body">
          <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                <tr>
          {{-- <table class="table table-striped table-hover" id="tabelBayar">
            <thead>
              <tr class="bg-dark text-light"> --}}
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Total Pembayaran</th>
                <th>Sisa Tunggakan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($siswa as $sis)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $sis->nis }}</td>
                <td>{{ $sis->nama }}</td>
                <td>{{ $sis->kelas->nama_kelas }}</td>
                @php
                    $totalBayar = DB::table('pembayaran')
                    ->select('jumlah')
                    ->where('id_siswa', $sis->id)
                    ->get()
                    ->sum('jumlah');
                  $sisa = $sis->spp->nominal - $totalBayar;  
                @endphp
                <td>Rp. {{number_format($totalBayar, 2, ',', '.') }}</td>
                <td>Rp. {{ number_format($sisa, 2, ',', '.') }}</td>
                <td class="text-center">
                  @if ($sisa == 0)
                  <span class="badge badge-danger px-4">LUNAS</span>                   
                  @else
                  <span class="badge badge-info">BELUM LUNAS</span>
                  @endif
                  <td>
                    @if ($sisa == 0)
                    <a href="/pembayaran/{{ $sis->id }}" class="btn btn-danger btn-sm btn-block">
                      <i class="fas fa-user-plus"></i> Detail
                    </a>
                    @else
                    <a href="/pembayaran/{{ $sis->id}}" class="btn btn-info btn-sm btn-block">
                      <i class="fas fa-money-bill"></i> Transaksi
                    </a> 
                    @endif
                  </td>
                 <form action="/pembayaran/ {{ $sis->id }}" method="post">
                  @method('delete')
                  @csrf
      
                 </form>
                </td>
              </tr>
               @endforeach
            </tbody>
          </table>
        </div>
      </div>
   </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
  
 @endsection

 @extends('layouts.template')
 @section('content')
 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
      <div class="row">
        <div class="col-12">
           @if (session('spp'))
      <div class="alert alert-dismissible bg-dark fade show text-center text-light" role="alert">
        {!! session('spp') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
          <a href="/spp/create" class="btn btn-success mb-3">
            <i class="fas fa-plus"></i> Tambah Data spp
          </a>
          <table class="table table-striped table-hover">
            <thead>
              <tr class="bg-dark text-light">
                <th>No</th>
                <th>Tahun spp</th>
                <th>Nominal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($spp as $sp)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $sp->tahun_spp }}</td>
                <td>{{ $sp->nominal }}</td>
                <td class="d-flex">
                   <a href="/spp/ {{ $sp->id }}/edit" class="btn btn-info btn-sm">
                  <i class="fas fa-edit">Edit</i>
                 </a>
                 <form action="/spp/ {{ $sp->id }}" method="post" >
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
        </div>
      </div>
   </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
 @endsection
 @extends('layouts.template')
 @section('content')
 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
      <div class="row">
        <div class="col-12">
           @if (session('petugas'))
      <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        {{ session('petugas') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
          <a href="/petugas/create" class="btn btn-success mb-3">
            <i class="fas fa-plus"></i> Tambah Data Petugas
          </a>
          <table class="table table-striped table-hover">
            <thead>
              <tr class="bg-dark text-light">
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Level</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($petugas as $p)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->username }}</td>
                <td>{{ $p->level }}</td>
                <td>{{ $p->status }}</td>
                <td class="d-flex">
                 <a href="/petugas/{{ $p->id }}" class="btn btn-info btn-sm">
                  <i class="fas fa-edit">Edit</i>
                 </a>
                 <form action="/petugas/ {{ $p->id }}/delete" method="post" >
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
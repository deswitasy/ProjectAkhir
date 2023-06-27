 @extends('layouts.template')
 @section('content')
 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
      <div class="row">
        <div class="col-12">
           @if (session('kelas'))
      <div class="alert alert-dismissible fade show bg-dark text-light text-center" role="alert">
        {!! session('kelas') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" >&times;</span>
        </button>
      </div>
      @endif
          <a href="/kelas/create" class="btn btn-success mb-3">
            <i class="fas fa-plus"></i> Tambah Data kelas
          </a>
          <table class="table table-striped table-hover">
            <thead>
              <tr class="bg-dark text-light">
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Jurusan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($kelas as $k)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $k->nama_kelas }}</td>
                <td>{{ $k->jurusan }}</td>
                <td class="d-flex">
                 <a href="/kelas/ {{ $k->id }}/edit" class="btn btn-info btn-sm">
                  <i class="fas fa-edit"></i> Edit
                 </a>
                <form action="/kelas/ {{ $k->id }}" method="post" >
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
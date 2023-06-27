 @extends('layouts.template')
 @section('content')
 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
      <div class="row">
        <div class="col-10">
          <p class="lead">Edit Data Form berikut</p>
           <!-- form start -->
              <form class="form-horizontal" action="/petugas/update" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $petugas->id }}">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ $petugas->nama }}" name="nama" placeholder="Nama Lengkap" readonly>
                      @error('nama')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ $petugas->username }}" name="username" placeholder="Username" readonly>
                      @error('username')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="level" class="col-sm-3 col-form-label">Level</label>
                    <div class="col-sm-9">
                      <select name="level" id="level" class="form-control" required>
                        <option value="">Pilih Level</option>
                        <option value="admin" {{ $petugas->level == 'admin' ? 'selected' : ''}}>Admin</option>
                        <option value="petugas" {{ $petugas->level == 'petugas' ? 'selected' : ''}}>Petugas</option>
                      </select>
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                      <select name="status" id="status" class="form-control" required>
                        <option value="">Pilih Status</option>
                        <option value="aktif" {{ $petugas->status == 'aktif' ? 'selected' : ''}}>Aktif</option>
                        <option value="nonaktif" {{ $petugas->status == 'nonaktif' ? 'selected' : ''}}>Nonaktif</option>
                      </select>
                    
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                  <a href="/petugas" class="btn btn-default float-right">Kembali</a>
                </div>
                <!-- /.card-footer -->
              </form>
        </div>
      </div>
   </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
 @endsection
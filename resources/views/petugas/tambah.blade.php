 @extends('layouts.template')
 @section('content')
 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
      <div class="row">
        <div class="col-10">
          <p class="lead">Isi Form berikut dengan data yang valid</p>
           <!-- form start -->
              <form class="form-horizontal" action="/petugas" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Lengkap" required>
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
                      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" required>
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
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                      </select>
                    </div>
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
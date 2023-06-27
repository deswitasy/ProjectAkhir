 @extends('layouts.template')
 @section('content')
 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
      <div class="row">
        <div class="col-10">
          <p class="lead">Isi Form berikut dengan data yang valid</p>
           <!-- form start -->
              <form class="form-horizontal" action="/kelas" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="nama_kelas" class="col-sm-3 col-form-label">Nama Kelas</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control  @error('nama_kelas') is-invalid @enderror" id="nama_kelas" name="nama_kelas" placeholder="Nama Kelas" required>
                      @error('nama_kelas')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="jurusan" class="col-sm-3 col-form-label">Jurusan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control  @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" placeholder="jurusan" required>
                      @error('jurusan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                  <a href="/kelas" class="btn btn-default float-right">Kembali</a>
                </div>
                <!-- /.card-footer -->
              </form>
        </div>
      </div>
   </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
 @endsection
 @extends('layouts.template')
 @section('content')
 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
      <div class="row">
        <div class="col-10">
          <p class="lead">Isi Form berikut dengan data yang valid</p>
           <!-- form start -->
              <form class="form-horizontal" action="/spp" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="tahun_spp" class="col-sm-3 col-form-label">Tahun Spp</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control  @error('tahun_spp') is-invalid @enderror" id="tahun_spp" name="tahun_spp" placeholder="Tahun Spp" required>
                      @error('tahun_spp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="nominal" class="col-sm-3 col-form-label">Nominal</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control  @error('nominal') is-invalid @enderror" id="nominal" name="nominal" placeholder="Nominal" required>
                      @error('nominal')
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
                  <a href="/spp" class="btn btn-default float-right">Kembali</a>
                </div>
                <!-- /.card-footer -->
              </form>
        </div>
      </div>
   </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
 @endsection
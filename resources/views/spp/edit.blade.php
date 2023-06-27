 @extends('layouts.template')
 @section('content')
 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
      <div class="row">
        <div class="col-10">
          <p class="lead">Edit Data Form berikut</p>
           <!-- form start -->
              <form class="form-horizontal" action="/spp/{{ $spp->id}}" method="post">
                @method('put')
                @csrf
                <input type="hidden" name="id" value="{{ $spp->id }}">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="tahun_spp" class="col-sm-3 col-form-label">tahun_spp</label>
                    <div class="col-sm-9">
                      <input type="text" name="tahun_spp" class="form-control @error('tahun_spp') is-invalid @enderror" id="tahun_spp" 
                     value="{{ old('tahun_spp', $spp->tahun_spp)  }}" >
                      @error('tahun_spp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="nominal" class="col-sm-3 col-form-label">nominal</label>
                     <div class="col-sm-9">
                      <input type="text" name="nominal" class="form-control @error('nominal') is-invalid @enderror" id="nominal" 
                     value="{{ old('nominal', $spp->nominal)  }}" >
                      @error('nominal')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
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
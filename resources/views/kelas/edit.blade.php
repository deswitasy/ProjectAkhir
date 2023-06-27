 @extends('layouts.template')
 @section('content')
 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-10">
         <p class="lead">Edit Data Form berikut</p>
         <!-- form start -->
         <form class="form-horizontal" action="/kelas/{{$kelas->id}}" method="post">
           @method('put')
           @csrf
          <input type="hidden" name="id" value="{{ $kelas->id }}">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="nama_kelas" class="col-sm-3 col-form-label">nama_kelas</label>
                    <div class="col-sm-9">
                      <input type="text" name="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" 
                     value="{{ old('nama_kelas', $kelas->nama_kelas)  }}" >
                      @error('nama_kelas')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
            <div class="form-group row">
                    <label for="jurusan" class="col-sm-3 col-form-label">jurusan</label>
                     <div class="col-sm-9">
                      <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" 
                     value="{{ old('jurusan', $kelas->jurusan)  }}" >
                      @error('jurusan')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
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
 @extends('layouts.template')
 @section('content')
 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
      <div class="row">
        <div class="col-10">
          <p class="lead">Isi Form berikut dengan data yang valid</p>
           <!-- form start -->
              <form class="form-horizontal" action="/siswa" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="nisn" class="col-sm-3 col-form-label"> NISN </label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control  @error('nisn') is-invalid @enderror" id="nisn"  name="nisn"  value="{{ old('nisn')}}" placeholder="Nisn" required>
                      @error('nisn')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="nis" class="col-sm-3 col-form-label"> NIS</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control  @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ old('nis')}}" placeholder=" NIS" required> 
                       @error('nis')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror 
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label"> Nama</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama')}}" placeholder=" Nama" required>
                       @error('nama')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label"> Email</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control  @error('email') is-invalid @enderror " id="email" name="email"
                      value="{{ old('email')}}" placeholder=" Email" required>
                       @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                 
                   <div class="form-group row">
                    <label for="no_hp" class="col-sm-3 col-form-label"> No Handphone</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control  @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" 
                      value="{{ old('no_hp')}}" placeholder=" No Handphone" required>
                       @error('no_hp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
               
                <div class="form-group row">
                   <label for="id_kelas" class="col-sm-3 col-form-label">Kelas</label>
                    <div class="col-sm-9">
                     <select class="form-control" @error('id_kelas') is-invalid @enderror name="id_kelas" id="id_kelas "required>
                    <option value="">Pilih Kelas</option>
                    @foreach ($kelas as $k)
                    <option value="{{ $k->id}}" @selected(old ('id_kelas') == $k->id) >
                      {{ $k->nama_kelas}}</option>
                    @endforeach
                    </select>
                       @error('id_kelas')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                </div>
                   <div class="form-group row">
                   <label for="id_spp" class="col-sm-3 col-form-label"> Spp</label>
                    <div class="col-sm-9">
                     <select class="form-control" @error('id_spp') is-invalid @enderror name="id_spp" id="id_spp "required>
                    <option value="">Pilih Spp</option>
                    @foreach ($spp as $s)
                    <option value="{{ $s->id}}" @selected(old ('id_spp') == $s->id) >
                      {{ $s->tahun_spp}} - Rp. {{ number_format($s->nominal, 2, '.', '.') }} </option>
                    @endforeach
                    </select>
                       @error('id_spp')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                </div>
                  <div class="form-group row">
                    <label for="alamat" class="col-sm-3 col-form-label"> Alamat</label>
                    <div class="col-sm-9">
                      <textarea type="text" class="form-control  @error('alamat') is-invalid @enderror" id="alamat" name="alamat" 
                      value="{{ old('alamat')}}" placeholder=" Alamat" required ></textarea>
                       @error('alamat')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                 
                 
                 
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                  <a href="/siswa" class="btn btn-default float-right">Kembali</a>
                </div>
                <!-- /.card-footer -->
              </form>
        </div>
      </div>
   </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
 @endsection
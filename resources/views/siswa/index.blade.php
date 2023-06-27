 @extends('layouts.template')
 @section('content')
 <!-- Main content -->
 <section class="content">
   <div class="container-fluid">
      <div class="row">
        <div class="col-12">
           @if (session('siswa'))
      <div class="alert alert-dismissible fade show bg-dark text-center text-light" role="alert">
        {{ session('siswa') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
          <a href="/siswa/create" class="btn btn-success mb-3">
            <i class="fas fa-plus"></i> Tambah Data siswa
          </a>
          <table class="table table-striped table-hover">
            <thead>
              <tr class="bg-dark text-light">
                <th>No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tahun SPP</th>
                <th>Jumlah SPP</th>
                <th>Aksi</th>
                @php
                  $no = 1;
              @endphp
              @foreach ($siswa as $s)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $s->nis }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->kelas->nama_kelas }}</td>
                <td>{{ $s->spp->tahun_spp }}</td>
                <td>Rp. {{ number_format($s->spp->nominal, 2, '.', '.') }}</td>
                <td class="d-flex">
                 <a href="" class="btn btn-info btn-primary detailSiswa btn-sm ml-2" data-toggle="modal" data-target="#siswaModal" data-id="{{ $s->id }}">
                  <i class="fas fa-user-plus"></i>  Detail
                 </a>
                 <a href="/siswa/{{ $s->id}}/edit" class="btn btn-warning text-light btn-sm ml-2">
                <i class="fas fa-edit"></i> Edit
                </a>
                <form action="/siswa/ {{ $s->id }}" method="post">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Yakin data ini akan dihapus?')">
                    <i class="fas fa-trash-alt">Hapus</i>
                  </button>
                 </form>
                </td>
              </tr>
               @endforeach
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>


 </section>

<style>
  .modal-body table tr td {
    padding: 10px 15px !important;
  }
</style>
<div class="modal fade" id="siswaModal" tabindex="-1" role="dialog" aria-labelledby="siswaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center text-dark" id="siswaModalLabel">Detail Data Siswa</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row d-flex align-items-center">
          <div class="col-12">
            <table class="table table-striped table-dark">
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td id="nama"></td>
              </tr>
              <tr>
                <td>NIS</td>
                <td>:</td>
                <td id="nis"></td>
              </tr>
              <tr>
                <td>NISN</td>
                <td>:</td>
                <td id="nisn"></td>
              </tr>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td id="email"></td>
              </tr>
              <tr>
                <td>Nomor HP</td>
                <td>:</td>
                <td id="no_hp"></td>
              </tr>
              <tr>
                <td>Kelas</td>
                <td>:</td>
                <td id="kelas"></td>
              </tr>
              <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td id="jurusan"></td>
              </tr>
              <tr>
                <td>Tahun SPP</td>
                <td>:</td>
                <td id="tahun_spp"></td>
              </tr>
              <tr>
                <td>Nominal SPP</td>
                <td>:</td>
                <td id="nominal"></td>
              </tr>
              <tr>
                <td width="150">Alamat Lengkap</td>
                <td width="15">:</td>
                <td id="alamat"></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $(function() {
    $('#dataTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    })
    // .buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');
  })
  $('.detailSiswa').on('click', function() {
    const id = $(this).data('id')
    $.ajax({
      url: '/siswa/getsiswa',
      data: {
        id: id
      },
      dataType: 'json',
      method: 'post',
      success: function(data) {
        $('#nama').html(data.siswa.nama)
        $('#nis').html(data.siswa.nis)
        $('#nisn').html(data.siswa.nisn)
        $('#email').html(data.siswa.email)
        $('#no_hp').html(data.siswa.no_hp)
        $('#alamat').html(data.siswa.alamat)
        $('#kelas').html(data.kelas.nama_kelas)
        $('#jurusan').html(data.kelas.jurusan)
        $('#tahun_spp').html(data.spp.tahun_spp)
        $('#nominal').html(data.spp.nominal)
      }
    })
  })
</script>
@endsection
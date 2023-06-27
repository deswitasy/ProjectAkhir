<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $title }}</title>

  <style>
    * {
      font-size: 14px;
      font-family: 'sans-serif';
      margin: 0;
    }

    .container {
      width: 95%;
      margin: 0 auto;
    }

    table {
      border: 1px solid black;
      width: 100%;
    }

    h1 {
      text-align: center;
      font-size: 24px;
    }

    h4 {
      text-align: center;
      font-size: 20px;
    }

    .bg-grey {
      background-color: grey;
      color: white;
    }

    .text-center {
      text-align: center;
    }

    .ttd {
      margin-left: 70%;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>LAPORAN PEMBAYARAN SPP</h1>
    @if ($tgl_awal)
    <h4 class="mb-4">Periode Pembayaran Tanggal : {{ ($tgl_awal) }} s.d
      {{ ($tgl_akhir) }}
    </h4>
    @else
    <h4 class="mb-4">Seluruh Periode Pembayaran</h4>
    @endif
    <br>
    <table border="1" cellspacing="0" cellpadding="5">
      <thead>
        <tr class="bg-grey">
          <th>No</th>
          <th>NIS</th>
          <th>Nama Siswa</th>
          <th>Kelas</th>
          <th>Jurusan</th>
          <th>Bulan Dibayar</th>
          <th>Tahun Dibayar</th>
          <th>Tanggal Bayar</th>
          <th>Jumlah</th>
          <th>Nama Penerima</th>
        </tr>
      </thead>
      <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($pembayaran as $p)
        <tr>
          <td class="text-center">{{ $no++ }}.</td>
          <td class="text-center">{{ $p->siswa->nis }}</td>
          <td>{{ $p->siswa->nama }}</td>
          <td>{{ $p->siswa->kelas->nama_kelas }}</td>
          <td>{{ $p->siswa->kelas->jurusan }}</td>
          <td>{{ $p->bulan->nama_bulan }}</td>
          <td class="text-center">{{ $p->tahun_bayar }}</td>
          <td class="text-center">{{ ($p->tgl_bayar) }}</td>
          <td class="text-center">Rp. {{ number_format($p->jumlah, 2, ',', '.') }}</td>
          <td>{{ $p->petugas->nama }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <br>
    <div class="ttd">
      <p>Purwakarta, {{ (date('Y-m-d')) }}</p>
      <p>Admin,</p>
      <br>
      <br>
      <br>
      <p>{{ auth()->user()->nama }}</p>
    </div>
  </div>
</body>

</html>
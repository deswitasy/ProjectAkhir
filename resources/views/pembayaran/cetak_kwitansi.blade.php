<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kwitansi Pembayaran</title>
    <style>
        /* Global Setting */
        * {
            font-family: 'Arial';
            padding: 0;
            margin: 0;
            font-size: 16px;
        }

        .text-blue {
            color: rgb(0, 81, 255);
        }

        .text-center {
            text-align: center;
        }

        .bg-blue {
            background-color: rgb(0, 81, 255);
            color: white;
        }

        .bg-grey {
            background-color: lightgrey;
        }

        .container {
            width: 90%;
            margin: 0 auto;
        }

        /* Page Setting */
        header {
            margin-top: 20px
        }

        header table {
            width: 90%;
            margin: 0 auto;
        }

        header img {
            width: 100px;
            margin-right: 20px;
        }

        header h1 {
            font-size: 24px;
        }

        header p {
            margin: 10px 0;
        }

        header h1:nth-child(2) {
            text-align: center;
            padding: 10px;
            border-top: 2px solid black;
            border-bottom: 2px solid black;
            margin-top: 10px;
            font-size: 26px;
        }

        #biodata table {
            width: 100%;
            margin-top: 5px;
        }

        #biodata .table-striped tr:nth-child(odd) {
            background-color: lightgrey;
        }

        #biodata table td {
            padding: 7px;
        }

        #deskripsi {
            margin: 10px 0;
        }

        #deskripsi table {
            width: 100%;
        }

        #deskripsi table tr th {
            padding: 10px;
        }

        #deskripsi table tr td {
            padding: 25px 10px;
        }

        #deskripsi table tr:nth-child(2) td {
            padding: 10px;
        }

        #deskripsi table tr:nth-child(3) td {
            padding: 15px 10px;
        }

        footer table {
            width: 100%;
        }

        footer p {
            margin-bottom: 8px;
        }

        footer ul {
            margin-left: 15px;
        }

        footer ul li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <table>
                <tr>
                    <td>
                        <img src="./images/logo.png" alt="">
                    </td>
                    <td>
                        <h1 class="text-blue">SMK PURNAWARMAN PURWAKARTA</h1>
                        <p>Jl. Jend. A. Yani No. 172 Cipaisan Purwakarta Jawa Barat Kode Pos 41113</p>
                        <p>Telp. (0264)202908 | Email: smkpn2020.info@gmail.com | Website: www.smkpurnawarman.sch.id</p>
                    </td>
                </tr>
            </table>
            <h1>KWITANSI PEMBAYARAN SPP SISWA</h1>
        </header>
        <section id="biodata">
            <table>
                <tr>
                    <td>
                        <table class="table-striped" cellspacing="0">
                            <tr>
                                <td width="80">Nama Siswa</td>
                                <td width="10">:</td>
                                <td style="text-transform: uppercase">{{ $pembayaran->siswa->nama }}</td>
                            </tr>
                            <tr>
                                <td>NIS</td>
                                <td>:</td>
                                <td>{{ $pembayaran->siswa->nis }}</td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>:</td>
                                <td>{{ $pembayaran->siswa->kelas->nama_kelas }}</td>
                            </tr>
                            <tr>
                                <td>Jurusan</td>
                                <td>:</td>
                                <td>{{ $pembayaran->siswa->kelas->jurusan }}</td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table class="table-striped" cellspacing="0">
                            <tr>
                                <td width="80">Tahun SPP</td>
                                <td width="10">:</td>
                                <td>{{ $pembayaran->spp->tahun_spp }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah SPP</td>
                                <td>:</td>
                                <td>Rp. {{ number_format($pembayaran->spp->nominal, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Pembayaran</td>
                                <td>:</td>
                                <td>{{ ($pembayaran->tgl_bayar) }}</td>
                            </tr>
                            <tr>
                                <td>Waktu Cetak</td>
                                <td>:</td>
                                <td style="color: grey">Pukul {{ date('H:i:s') }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </section>
        <section id="deskripsi">
            <table cellspacing="0" cellpadding="5">
                <thead>
                    <tr class="bg-blue">
                        <th width="40">No</th>
                        <th>Keterangan Pembayaran</th>
                        <th colspan="2">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-grey">
                        <td class="text-center">1.</td>
                        <td>Pembayaran SPP untuk bulan {{ $pembayaran->bulan->nama_bulan }}
                            {{ $pembayaran->tahun_bayar }}</td>
                        <td width="10">Rp. </td>
                        <td style="text-align: right; width: 100px;">
                            {{ number_format($pembayaran->jumlah, 2, ',', '.') }}</td>
                    </tr>
                    <tr class="bg-blue">
                        <td colspan="2">Total Bayar</td>
                        <td width="10">Rp. </td>
                        <td style="text-align: right; width: 100px;">
                            {{ number_format($pembayaran->jumlah, 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <h4><strong class="text-blue">Terbilang :
                                    <i># {{ ($pembayaran->jumlah) }} #</i></strong></h4>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <footer>
            <table>
                <tr>
                    <td>
                        <p>Catatan :</p>
                        <ul>
                            <li>Disimpan sebagai bukti pembayaran yang SAH.</li>
                            <li>Uang yang sudah dibayarkan tidak dapat diminta kembali</li>
                        </ul>
                    </td>
                    <td class="text-center">
                        <p>Purwakarta, {{ (date('Y-m-d')) }}</p>
                        <p>Yang Menerima,</p>
                        <img src="./images/ttd.png" alt="" width="80">
                        <p><strong>{{ auth()->user()->nama }}</strong></p>
                    </td>
                </tr>
            </table>
        </footer>
    </div>
</body>

</html>

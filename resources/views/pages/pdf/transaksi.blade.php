<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Laporan Buku</title>

        <style>
        body{
        font-family: sans-serif;
        }

        table{
        width:100%;
        border-collapse:collapse;
        margin-top:20px;
        }

        table, th, td{
        border:1px solid black;
        }

        th,td{
        padding:8px;
        font-size:12px;
        }

        h2{
        text-align:center;
        }
        </style>

    </head>

    <body>

        <h2>Laporan Transaksi</h2>

        <table>
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Anggota</th>
                <th>Buku</th>
                <th>Denda</th>
                <th>Status</th>
            </tr>

            @foreach($daftarTransaksi as $transaksi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaksi->id_transaksi }}</td>
                <td>{{ $transaksi->tanggal_pinjam }}</td>
                <td>{{ $transaksi->tanggal_kembali ?? 'Belum Dikembalikan' }}</td>
                <td>{{ $transaksi->anggota->nama }}</td>
                <td>{{ $transaksi->buku->judul_buku }}</td>
                <td>Rp {{ number_format($transaksi->denda,0,',','.') }}</td>
                <td>{{ $transaksi->status }}</td>
            </tr>
            @endforeach
        </table>

    </body>
</html>
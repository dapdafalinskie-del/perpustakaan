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

        <h2>Laporan Data Buku</h2>


        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th>Rak</th>
                    <th>Stok</th>
                </tr>
            </thead>

            <tbody>
                @foreach($daftarBuku as $buku)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $buku->kode_buku }}</td>
                    <td>{{ $buku->judul_buku }}</td>
                    <td>{{ $buku->pengarang }}</td>
                    <td>{{ $buku->penerbit }}</td>
                    <td>{{ $buku->tahun }}</td>
                    <td>{{ $buku->kategori }}</td>
                    <td>{{ $buku->rak }}</td>
                    <td>{{ $buku->stok }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </body>
</html>
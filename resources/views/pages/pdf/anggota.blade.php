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

    <h2>Laporan Data Anggota</h2>

    <table>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Nama</th>
            <th>JK</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>No HP</th>
        </tr>

        @foreach($daftarAnggota as $anggota)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $anggota->id_anggota }}</td>
            <td>{{ $anggota->nama }}</td>
            <td>{{ $anggota->jenis_kelamin }}</td>
            <td>{{ $anggota->kelas }}</td>
            <td>{{ $anggota->jurusan }}</td>
            <td>{{ $anggota->no_hp }}</td>
        </tr>
        @endforeach
    </table>

    </body>
</html>
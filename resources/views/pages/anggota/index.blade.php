@extends('layout.app')
@section('title', 'Masterdata - Anggota')
@section('breadcrumb')
<li>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-3.5"><path d="m9 18 6-6-6-6" /></svg>
</li>
<li class="inline-flex items-center gap-1.5">
    <a class="hover:text-foreground transition-colors">Masterdata</a>
</li>
<li>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-3.5"><path d="m9 18 6-6-6-6" /></svg>
</li>
<li class="inline-flex items-center gap-1.5">
    <a class="text-foreground">Anggota</a>
</li>
@endsection
@section('content')
<div class="card">
    <header>
        <h2>Daftar Anggota</h2>
        <div class="flex gap-2 mt-2">
            <form method="GET">
                <input class="input w-xs" type="text" name="search" value="{{ request('search') }}" placeholder="Cari anggota.." onchange="this.form.submit()">
            </form>
            <a href="{{ route('laporan.anggota') }}" target="_blank" class="btn-secondary ms-auto">Cetak Laporan</a>
            <a href="{{ route('anggota.create') }}" class="btn">Tambah Anggota</a>
        </div>
    </header>
    <section>
        <div class="overflow-x-auto">
        <table class="table">
        <caption>Menampilkan seluruh anggota perpustakaan yang terdaftar di sistem.</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>Id Anggota</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Tanggal Daftar</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftarAnggota as $anggota)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="font-medium">{{ $anggota->id_anggota }}</td>
                <td>{{ $anggota->nama }}</td>
                <td class="font-medium">{{ $anggota->jenis_kelamin }}</td>
                <td>{{ $anggota->kelas }}</td>
                <td>{{ $anggota->jurusan }}</td>
                <td>{{ $anggota->alamat }}</td>
                <td>{{ $anggota->no_hp }}</td>
                <td>{{ $anggota->tanggal_daftar->locale('id')->translatedFormat('Y-m-d') }}</td>
                <td class="flex justify-center gap-2">
                    <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn-outline">Edit</a>
                    <button class="btn-destructive" onclick="document.getElementById('destroy-dialog-{{ $anggota->id }}').showModal()">Hapus</button>
                </td>
            </tr>
                
            <dialog id="destroy-dialog-{{ $anggota->id }}" class="dialog" aria-labelledby="destroy-dialog-{{ $anggota->id }}-title" aria-describedby="destroy-dialog-{{ $anggota->id }}-description">
                <div>
                    <header>
                    <h2 id="destroy-dialog-{{ $anggota->id }}-title">Hapus anggota ({{ $anggota->id_anggota }})?</h2>
                    <p id="destroy-dialog-{{ $anggota->id }}-description">Data anggota yang dipilih akan dihapus dari sistem. Tindakan ini tidak dapat dibatalkan.</p>
                    </header>

                    <footer class="flex justify-between">
                    <button class="btn-outline" onclick="document.getElementById('destroy-dialog-{{ $anggota->id }}').close()">Batal</button>
                    <form method="POST" action="{{ route('anggota.destroy', $anggota->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-destructive" >Hapus</button>
                    </form>
                    </footer>
                </div>
            </dialog>
            @empty
                
            @endforelse
        </tbody>
        </table>
        </div>
    </section>
</div>

@endsection
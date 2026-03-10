@extends('layout.app')
@section('title', 'Masterdata - Buku')
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
    <a class="text-foreground">Buku</a>
</li>
@endsection
@section('content')
<div class="card">
    <header class="flex">
        <h2>Daftar Buku</h2>
        <a href="{{ route('buku.create') }}" class="btn ms-auto">Tambah Buku</a>
    </header>
    <section>
        <div class="overflow-x-auto">
        <table class="table">
        <caption>Menampilkan seluruh buku perpustakaan yang terdaftar di sistem.</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Kategori</th>
                <th>Rak</th>
                <th>Stok</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftarBuku as $buku)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="font-medium">{{ $buku->kode_buku }}</td>
                <td>{{ $buku->judul_buku }}</td>
                <td>{{ $buku->pengarang }}</td>
                <td>{{ $buku->penerbit }}</td>
                <td>{{ $buku->tahun }}</td>
                <td>{{ $buku->kategori }}</td>
                <td>{{ $buku->rak }}</td>
                <td>{{ $buku->stok }}</td>
                <td class="flex justify-center gap-2">
                    <a href="{{ route('buku.edit', $buku->id) }}" class="btn-outline">Edit</a>
                    <button class="btn-destructive" onclick="document.getElementById('destroy-dialog-{{ $buku->id }}').showModal()">Hapus</button>
                </td>
            </tr>
                
            <dialog id="destroy-dialog-{{ $buku->id }}" class="dialog" aria-labelledby="destroy-dialog-{{ $buku->id }}-title" aria-describedby="destroy-dialog-{{ $buku->id }}-description">
                <div>
                    <header>
                    <h2 id="destroy-dialog-{{ $buku->id }}-title">Hapus buku ({{ $buku->kode_buku }})?</h2>
                    <p id="destroy-dialog-{{ $buku->id }}-description">Buku yang dipilih akan dihapus dari sistem. Tindakan ini tidak dapat dibatalkan.</p>
                    </header>

                    <footer class="flex justify-between">
                    <button class="btn-outline" onclick="document.getElementById('destroy-dialog-{{ $buku->id }}').close()">Batal</button>
                    <form method="POST" action="{{ route('buku.destroy', $buku->id) }}">
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
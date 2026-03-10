@extends('layout.app')
@section('title', 'Masterdata - Tambah Buku')
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
    <a href="{{ route('buku.index') }}" class="hover:text-foreground transition-colors">Buku</a>
</li>
<li>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-3.5"><path d="m9 18 6-6-6-6" /></svg>
</li>
<li class="inline-flex items-center gap-1.5">
    <a class="text-foreground">Create</a>
</li>
@endsection
@section('content')
<div class="card w-2xl">
    <header>
        <h2>Form Buku</h2>
    </header>
    <section>
        <form method="POST" action="{{ route('buku.store') }}" class="form grid gap-6">
            @csrf
            <div class="grid gap-2">
                <label>Judul Buku</label>
                <input type="text" name="judul_buku" placeholder="Masukan judul buku" value="{{ old('judul_buku') }}" @error('judul_buku') aria-invalid="true" @enderror>
                @error('judul_buku')
                <p class="text-destructive text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-2">
                <label>Pengarang</label>
                <input type="text" name="pengarang" placeholder="Masukkan nama pengarang" value="{{ old('pengarang') }}" @error('pengarang') aria-invalid="true" @enderror>
                @error('pengarang')
                <p class="text-destructive text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-2">
                <label>Penerbit</label>
                <input type="text" name="penerbit" placeholder="Masukkan nama penerbit" value="{{ old('penerbit') }}" @error('penerbit') aria-invalid="true" @enderror>
                @error('penerbit')
                <p class="text-destructive text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-2">
                <label>Tahun</label>
                <input type="text" name="tahun" placeholder="Contoh: 2024" value="{{ old('tahun') }}" @error('tahun') aria-invalid="true" @enderror maxlength="4">
                @error('tahun')
                <p class="text-destructive text-sm">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="grid gap-2">
                <label>Kategori</label>
                <input type="text" name="kategori" placeholder="Contoh: Teknologi" value="{{ old('kategori') }}" @error('kategori') aria-invalid="true" @enderror>
                @error('kategori')
                <p class="text-destructive text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-2">
                <label>Rak</label>
                <input type="text" name="rak" placeholder="Contoh: A1" value="{{ old('rak') }}" @error('rak') aria-invalid="true" @enderror>
                @error('rak')
                <p class="text-destructive text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-2">
                <label>Stok</label>
                <input type="text" name="stok" placeholder="Masukkan jumlah stok" value="{{ old('stok') }}" @error('stok') aria-invalid="true" @enderror>
                @error('stok')
                <p class="text-destructive text-sm">{{ $message }}</p>
                @enderror
            </div>
            <footer class="flex">
                <a href="{{ route('buku.index') }}" class="btn-secondary mr-auto">Kembali</a>
                <button type="submit" class="btn">Tambah</button>
            </footer>
        </form>
    </section>
</div>

@endsection
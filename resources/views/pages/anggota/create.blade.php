@extends('layout.app')
@section('title', 'Masterdata - Tambah Anggota')
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
    <a href="{{ route('anggota.index') }}" class="hover:text-foreground transition-colors">Anggota</a>
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
        <h2>Form Anggota</h2>
    </header>
    <section>
        <form method="POST" action="{{ route('anggota.store') }}" class="form grid gap-6">
            @csrf
            <div class="grid gap-2">
                <label>Nama</label>
                <input type="text" name="nama" placeholder="Masukan nama" value="{{ old('nama') }}" @error('nama') aria-invalid="true" @enderror>
                @error('nama')
                <p class="text-destructive text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-2">
                <label>Jenis Kelamin</label>
                <div id="select-jenis-kelamin" class="select">
                <button type="button" class="btn-outline w-full" id="select-jenis-kelamin-trigger" aria-haspopup="listbox" aria-expanded="false" aria-controls="select-jenis-kelamin-listbox" @error('select-jenis-kelamin-value') aria-invalid="true" @enderror>
                    <span class="truncate"></span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevrons-up-down-icon lucide-chevrons-up-down text-destructive opacity-50 shrink-0">
                    <path d="m7 15 5 5 5-5" />
                    <path d="m7 9 5-5 5 5" />
                    </svg>
                </button>
                <div id="select-jenis-kelamin-popover" data-popover aria-hidden="true">
                    <div role="listbox" id="select-jenis-kelamin-listbox" aria-orientation="vertical" aria-labelledby="select-jenis-kelamin-trigger" data-empty="No framework found.">
                    <div role="option" data-value="L">Laki-laki</div>
                    <div role="option" data-value="P">Perempuan</div>
                    </div>
                </div>
                <input type="hidden" name="select-jenis-kelamin-value" value="" />
                </div>

                @error('select-jenis-kelamin-value')
                <p class="text-destructive text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-2">
                <label>Kelas</label>
                <input type="text" name="kelas" placeholder="Masukan kelas" value="{{ old('kelas') }}" @error('kelas') aria-invalid="true" @enderror>
                @error('kelas')
                <p class="text-destructive text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-2">
                <label>Jurusan</label>
                <input type="text" name="jurusan" placeholder="Masukan jurusan" value="{{ old('jurusan') }}" @error('jurusan') aria-invalid="true" @enderror>
                @error('jurusan')
                <p class="text-destructive text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-2">
                <label>Alamat</label>
                <input type="text" name="alamat" placeholder="Masukan alamat" value="{{ old('alamat') }}" @error('alamat') aria-invalid="true" @enderror>
                @error('alamat')
                <p class="text-destructive text-sm">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="grid gap-2">
                <label>Nomor HP</label>
                <input type="text" name="no_hp" placeholder="Masukan nomor hp" value="{{ old('no_hp') }}" @error('no_hp') aria-invalid="true" @enderror>
                @error('no_hp')
                <p class="text-destructive text-sm">{{ $message }}</p>
                @enderror
            </div>
            <footer class="flex">
                <a href="{{ route('anggota.index') }}" class="btn-secondary mr-auto">Kembali</a>
                <button type="submit" class="btn">Tambah</button>
            </footer>
        </form>
    </section>
</div>

@endsection
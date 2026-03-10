@extends('layout.app')
@section('title', 'Tambah Transaksi')
@section('breadcrumb')
<li>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-3.5"><path d="m9 18 6-6-6-6" /></svg>
</li>
<li class="inline-flex items-center gap-1.5">
    <a href="{{ route('buku.index') }}" class="hover:text-foreground transition-colors">Transaksi</a>
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
        <h2>Form Transaksi</h2>
    </header>
    <section>
        <form method="POST" action="{{ route('transaksi.store') }}" class="form grid gap-6">
            @csrf
            <div class="grid gap-2">
                <label>Pilih Buku</label>
                <div id="select-buku" class="select">
                <button type="button" class="btn-outline w-full" id="select-buku-trigger" aria-haspopup="listbox" aria-expanded="false" aria-controls="select-buku-listbox" @error('select-buku-value') aria-invalid="true" @enderror>
                    <span class="truncate"></span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevrons-up-down-icon lucide-chevrons-up-down text-destructive opacity-50 shrink-0">
                    <path d="m7 15 5 5 5-5" />
                    <path d="m7 9 5-5 5 5" />
                    </svg>
                </button>
                <div id="select-buku-popover" data-popover aria-hidden="true">
                    <div role="listbox" id="select-buku-listbox" aria-orientation="vertical" aria-labelledby="select-buku-trigger" data-empty="No framework found.">
                    <div role="option" data-value="">Pilih Buku</div>
                    @foreach ($daftarBuku as $buku)
                    <div role="option" data-value="{{ $buku->id }}">{{ $buku->judul_buku }}</div>
                    @endforeach
                    </div>
                </div>
                <input type="hidden" name="select-buku-value"  value="{{ old('select-buku-value') }}" />
                </div>
                @error('judul_buku')
                <p class="text-destructive text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid gap-2">
                <label>Pilih Anggota</label>
                <div id="select-anggota" class="select">
                <button type="button" class="btn-outline w-full" id="select-anggota-trigger" aria-haspopup="listbox" aria-expanded="false" aria-controls="select-anggota-listbox" @error('select-anggota-value') aria-invalid="true" @enderror>
                    <span class="truncate"></span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevrons-up-down-icon lucide-chevrons-up-down text-destructive opacity-50 shrink-0">
                    <path d="m7 15 5 5 5-5" />
                    <path d="m7 9 5-5 5 5" />
                    </svg>
                </button>
                <div id="select-anggota-popover" data-popover aria-hidden="true">
                    <div role="listbox" id="select-anggota-listbox" aria-orientation="vertical" aria-labelledby="select-anggota-trigger" data-empty="No framework found.">
                    <div role="option" data-value="">Pilih Anggota</div>
                    @foreach ($daftarAnggota as $anggota)
                    <div role="option" data-value="{{ $anggota->id }}">{{ $anggota->nama }}</div>
                    @endforeach
                    </div>
                </div>
                <input type="hidden" name="select-anggota-value" value="{{ old('select-anggota-value') }}" />
                </div>
                @error('pengarang')
                <p class="text-destructive text-sm">{{ $message }}</p>
                @enderror
            </div>

            <footer class="flex">
                <a href="{{ route('transaksi.index') }}" class="btn-secondary mr-auto">Kembali</a>
                <button type="submit" class="btn">Tambah</button>
            </footer>
        </form>
    </section>
</div>

@endsection
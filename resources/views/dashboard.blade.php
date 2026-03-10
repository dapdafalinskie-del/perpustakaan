@extends('layout.app')
@section('title', 'Dashboard')
@section('breadcrumb')
<li>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-3.5"><path d="m9 18 6-6-6-6" /></svg>
</li>
<li class="inline-flex items-center gap-1.5">
    <a href="{{ route('dashboard') }}" class="text-foreground">Dashboard</a>
</li>
@endsection
@section('content')
<div class="space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold">Dashboard</h1>
            <p class="text-sm text-muted-foreground">
            Ringkasan aktivitas sistem perpustakaan
            </p>
        </div>
    </div>

    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">

        <article class="flex items-center border rounded-md p-4 gap-4">
            <div class="flex items-center justify-center size-10 rounded-md bg-muted">
                <x-lucide-book class="w-5 h-5 text-muted-foreground"/>
                </div>
                <div class="flex flex-col">
                <span class="text-sm text-muted-foreground">Total Buku</span>
                <span class="text-lg font-semibold">{{ $jumlahBuku }}</span>
            </div>
        </article>

        <article class="flex items-center border rounded-md p-4 gap-4">
            <div class="flex items-center justify-center size-10 rounded-md bg-muted">
                <x-lucide-users class="w-5 h-5 text-muted-foreground"/>
                </div>
                <div class="flex flex-col">
                <span class="text-sm text-muted-foreground">Total Anggota</span>
                <span class="text-lg font-semibold">{{ $jumlahAnggota }}</span>
            </div>
        </article>

        <article class="flex items-center border rounded-md p-4 gap-4">
            <div class="flex items-center justify-center size-10 rounded-md bg-muted">
                <x-lucide-book-open class="w-5 h-5 text-muted-foreground"/>
                </div>
                <div class="flex flex-col">
                <span class="text-sm text-muted-foreground">Sedang Dipinjam</span>
                <span class="text-lg font-semibold">{{ $jumlahDipinjam }}</span>
            </div>
        </article>

        <article class="flex items-center border rounded-md p-4 gap-4">
            <div class="flex items-center justify-center size-10 rounded-md bg-muted">
                <x-lucide-triangle-alert class="w-5 h-5 text-muted-foreground"/>
                </div>
                <div class="flex flex-col">
                <span class="text-sm text-muted-foreground">Terlambat</span>
                <span class="text-lg font-semibold">{{ $jumlahTerlambat }}</span>
            </div>
        </article>

    </div>

    <div class="border rounded-md p-4">

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-sm font-medium">Transaksi Terbaru</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Anggota</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($daftarTransaksi as $transaksi)
                    <tr>
                        <td>{{ $transaksi->id_transaksi }}</td>
                        <td>{{ $transaksi->anggota->nama }}</td>
                        <td>{{ $transaksi->buku->judul_buku }}</td>
                        <td>{{ $transaksi->tanggal_pinjam }}</td>
                        <td>
                            <span class="badge 
                            @if($transaksi->status === 'terlambat')
                            badge-destructive
                            @elseif($transaksi->status === 'kembali')
                            badge-secondary
                            @endif
                            ">{{ Str::headline($transaksi->status) }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>

</div>
@endsection
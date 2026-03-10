@extends('layout.app')
@section('title', 'Transaksi')
@section('breadcrumb')
<li>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-3.5"><path d="m9 18 6-6-6-6" /></svg>
</li>
<li class="inline-flex items-center gap-1.5">
    <a class="text-foreground">Transaksi</a>
</li>
@endsection
@section('content')
<div class="card">
    <header>
        <h2>Daftar Transaksi</h2>
        <div class="flex gap-2 mt-2">
            <form method="GET">
                <input class="input w-xs" type="text" name="search" value="{{ request('search') }}" placeholder="Cari transaksi, anggota, atau buku..." onchange="this.form.submit()" >
            </form>
            <a href="{{ route('laporan.transaksi') }}" target="_blank" class="btn-secondary ms-auto">Cetak Laporan</a>
            <a href="{{ route('transaksi.create') }}" class="btn">Tambah Transaksi</a>
        </div>
    </header>
    <section>
        <div class="overflow-x-auto">
        <table class="table">
        <caption>Menampilkan seluruh transaksi perpustakaan yang terdaftar di sistem.</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>Id Transaksi</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Id Anggota</th>
                <th>Nama Anggota</th>
                <th>Kelas</th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Denda</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftarTransaksi as $transaksi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="font-medium">{{ $transaksi->id_transaksi }}</td>
                <td>{{ $transaksi->tanggal_pinjam }}</td>
                <td>{{ $transaksi->tanggal_kembali ?? 'Belum Dikembalikan' }}</td>
                <td class="font-medium">{{ $transaksi->anggota->id_anggota }}</td>
                <td>{{ $transaksi->anggota->nama }}</td>
                <td>{{ $transaksi->anggota->kelas }}</td>
                <td class="font-medium">{{ $transaksi->buku->kode_buku }}</td>
                <td>{{ $transaksi->buku->judul_buku }}</td>
                <td>Rp {{ number_format($transaksi->denda, 0, ',', '.') }}</td>
                <td>
                    <span class="badge 
                    @if($transaksi->status === 'terlambat')
                    badge-destructive
                    @elseif($transaksi->status === 'kembali')
                    badge-secondary
                    @endif
                    ">{{ Str::headline($transaksi->status) }}</span>
                </td>

                <td class="flex justify-center gap-2">
                    <form action="{{ route('transaksi.return', $transaksi->id) }}">
                        <button class="btn-outline" {{ $transaksi->status === 'kembali' | $transaksi->status === 'terlambat' ? 'disabled' : '' }}>Kembalikan</button>
                    </form>
                </td>
            </tr>
            @empty
                
            @endforelse
        </tbody>
        </table>
        </div>
    </section>
</div>

@endsection
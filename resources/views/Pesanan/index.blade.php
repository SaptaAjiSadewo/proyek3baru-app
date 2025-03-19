@extends('layouts.admin')
{{-- Gunakan layout admin yang sudah menyediakan navbar dan CSS --}}

@section('content')
<div class="container">
    <div class="card row mb-4">
        <h2 class="card-header">Rekap Pesanan</h2>
        <!-- Statistik Card -->
        <div class="row mb-4 mt-2">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-header mb-2"><i class="bi bi-file-earmark-plus"></i></i> Pesanan Baru</h5>
                        <h3 class="card-text mb-2">{{ $totalCustomers }}</h3>
                        <a href="#akun" class="btn btn-primary text-center">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-header mb-2"><i class="bi bi-tools"></i> Pesanan Diproses</h5>
                        <h3 class="card-text mb-2">{{ $totalServices }}</h3>
                        <a href="#jasa" class="btn btn-primary text-center">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-header mb-2"><i class="bi bi-truck"></i> Pesanan Diantar</h5>
                        <h3 class="card-text mb-2">{{ $totalCustomers }}</h3>
                        <a href="#akun" class="btn btn-primary text-center">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-header mb-2"><i class="bi bi-card-checklist"></i> Pesanan Selesai</h5>
                        <h3 class="card-text mb-2">{{ $totalCustomers }}</h3>
                        <a href="#akun" class="btn btn-primary text-center">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <a href="{{ route('pesanan.create') }}" class="btn btn-primary mb-3">Tambah Pesanan</a>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card row mb-4">
            <h2 class="card-header">Daftar Pesanan</h2>
            <table class="table table-bordered table-hover align-middle">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Total Pembayaran</th>
                        <th>Metode Pembayaran</th>
                        <th>Layanan yang Dipesan</th>
                        <th>Waktu Pemesanan</th>
                        <th>Status</th>
                        <th>Bukti Transfer</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesanans as $pesanan)
                    <tr>
                        <td>{{ $pesanan->nama }}</td>
                        <td>{{ $pesanan->alamat }}</td>
                        <td>{{ $pesanan->no_telepon }}</td>
                        <td>Rp {{ number_format($pesanan->total_pembayaran, 0, ',', '.') }}</td>
                        <td>{{ $pesanan->metode_pembayaran }}</td>
                        <td>{{ $pesanan->layanan_dipesan }}</td>
                        <td>{{ $pesanan->waktu_pemesanan }}</td>
                        <td>{{ $pesanan->status }}</td>
                        <td>
                            @if($pesanan->bukti_transfer)
                            <img src="{{ asset('storage/' . $pesanan->bukti_transfer) }}"
                                alt="Bukti Transfer"
                                style="width:100px;">
                            @else
                            Tidak ada bukti
                            @endif
                        </td>
                        <td>{{ $pesanan->catatan }}</td>
                        <td>
                            <a href="{{ route('pesanan.edit', $pesanan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pesanan.destroy', $pesanan->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus pesanan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="11" class="text-center">Belum ada pesanan masuk</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endsection
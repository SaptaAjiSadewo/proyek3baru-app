@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Edit Pesanan</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('pesanan.update', $pesanan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $pesanan->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required>{{ $pesanan->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="{{ $pesanan->no_telepon }}" required>
        </div>
        <div class="mb-3">
            <label for="total_pembayaran" class="form-label">Total Pembayaran</label>
            <input type="number" name="total_pembayaran" id="total_pembayaran" class="form-control" step="0.01" value="{{ $pesanan->total_pembayaran }}" required>
        </div>
        <div class="mb-3">
            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
            <input type="text" name="metode_pembayaran" id="metode_pembayaran" class="form-control" value="{{ $pesanan->metode_pembayaran }}" required>
        </div>
        <div class="mb-3">
            <label for="layanan_dipesan" class="form-label">Layanan yang Dipesan</label>
            <input type="text" name="layanan_dipesan" id="layanan_dipesan" class="form-control" value="{{ $pesanan->layanan_dipesan }}" required>
        </div>
        <div class="mb-3">
            <label for="waktu_pemesanan" class="form-label">Waktu Pemesanan</label>
            <input type="datetime-local" name="waktu_pemesanan" id="waktu_pemesanan" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($pesanan->waktu_pemesanan)) }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" name="status" id="status" class="form-control" value="{{ $pesanan->status }}" required>
        </div>
        <div class="mb-3">
            <label for="bukti_transfer" class="form-label">Bukti Transfer</label>
            @if($pesanan->bukti_transfer)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $pesanan->bukti_transfer) }}" alt="Bukti Transfer" style="width:100px;">
                </div>
            @endif
            <input type="file" name="bukti_transfer" id="bukti_transfer" class="form-control">
        </div>
        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea name="catatan" id="catatan" class="form-control">{{ $pesanan->catatan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Pesanan</button>
    </form>
</div>
@endsection

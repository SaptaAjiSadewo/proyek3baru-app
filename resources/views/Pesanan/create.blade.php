@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2>Tambah Pesanan</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('pesanan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="text" name="no_telepon" id="no_telepon" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="total_pembayaran" class="form-label">Total Pembayaran</label>
            <input type="number" name="total_pembayaran" id="total_pembayaran" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
            <select name="metode_pembayaran" id="metode_pembayaran" class="form-control" required>
                <option value="">Pilih Metode Pembayaran</option>
                <option value="transfer bank">Transfer Bank</option>
                <option value="dana">Dana</option>
                <option value="gopay">Gopay</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="layanan_dipesan" class="form-label">Layanan yang Dipesan</label>
            <input type="text" name="layanan_dipesan" id="layanan_dipesan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="waktu_pemesanan" class="form-label">Waktu Pemesanan</label>
            <input type="datetime-local" name="waktu_pemesanan" id="waktu_pemesanan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" name="status" id="status" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="bukti_transfer" class="form-label">Bukti Transfer</label>
            <input type="file" name="bukti_transfer" id="bukti_transfer" class="form-control">
        </div>
        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea name="catatan" id="catatan" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Pesanan</button>
    </form>
</div>
@endsection
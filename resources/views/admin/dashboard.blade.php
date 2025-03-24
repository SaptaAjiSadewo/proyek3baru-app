    @extends('layouts.admin')

    @section('content')
    <style>
        #column-example-1 {
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
        }

        #column-example-1 .column {
            --aspect-ratio: 4 / 3;
        }
    </style>
    <div class="container">
        <!-- Card Dashboard -->
        <!--<div class="row justify-content-center mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>-->

        <div class="row mb-4">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-header mb-2"><i class="bi bi-person-check-fill"></i> Akun Yang Terdaftar</h5>
                        <h3 class="card-text mb-2">{{ $totalCustomers }}</h3>
                        <a href="#akun" class="btn btn-primary text-center">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-header mb-2"><i class="bi bi-tools"></i> Jasa Yang Tersedia</h5>
                        <h3 class="card-text mb-2">{{ $totalServices }}</h3>
                        <a href="#jasa" class="btn btn-primary text-center">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-header mb-2"><i class="bi bi-file-check-fill"></i> Total Pesanan</h5>
                        <h3 class="card-text mb-2">{{ $totalCustomers }}</h3>
                        <a href="#akun" class="btn btn-primary text-center">Lihat</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="card row mb-4">
            <h2 class="card-header">Chart Statistik</h2>
            <div id="column-example-1">
                <table class="charts-css column hide-data">
                    <caption> Column Example #1 </caption>
                    <tbody>
                        <tr>
                            <td style="--size: 0.1 ;"><span class="data"> {{ $totalCustomers }} Akun Pengguna </span></td>
                        </tr>
                        <tr>
                            <td style="--size: 0.1 ;"><span class="data"> {{ $totalServices }} Jasa </span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Dashboardchart -->
        <div class="card row mb-4">
            <h2 class="card-header">Statistik Data</h2>
            <div class="card-body">
                <h5 class="card-title">Data Akun dan Jasa</h5>
                <p class="card-text">Total Akun Pengguna: <strong>{{ $totalCustomers }}</strong></p>
                <p class="card-text">Total Jasa: <strong>{{ $totalServices }}</strong></p>
            </div>
        </div>


        <!-- Akun Pelanggan -->
        <div class="card row mb-4">
            <h2 class="card-header" id="akun">Akun Pelanggan</h2>
            <div class="col-md-12">
                <div class="card-body">
                    <a href="{{ route('customers.create') }}" class="btn btn-primary">Tambah Pelanggan</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->nama }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->telepon }}</td>
                            <td>{{ $customer->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('customers.edit', $customer->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Daftar Jasa -->
        <div class="card row">
            <h2 class="card-header" id="jasa">Daftar Jasa</h2>
            <div class=" col-md-12">
                <div class="card-body">
                    <a href="{{ route('services.create') }}" class="btn btn-primary">Tambah Jasa</a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Jasa</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->nama_jasa }}</td>
                            <td>{{ $service->deskripsi }}</td>
                            <td>{{ number_format($service->harga, 2) }}</td>
                            <td>
                                <a href="{{ route('services.edit', $service->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    

    <!-- Daftar Pesanan -->
    <div class="card row mt-4">
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
        </div>

    @endsection
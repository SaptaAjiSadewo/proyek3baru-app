<!-- resources/views/admin/services.blade.php -->
@extends('layouts.admin')

@section('content')
  <h1>Daftar Jasa</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Jasa</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Dibuat</th>
      </tr>
    </thead>
    <tbody>
      @foreach($services as $service)
      <tr>
        <td>{{ $service->id }}</td>
        <td>{{ $service->nama_jasa }}</td>
        <td>{{ $service->deskripsi }}</td>
        <td>{{ number_format($service->harga, 2) }}</td>
        <td>{{ $service->created_at->format('d-m-Y') }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

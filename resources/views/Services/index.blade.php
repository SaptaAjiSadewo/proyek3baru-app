@extends('layouts.admin')

@section('content')
<div class="mb-3">
    <h1>Data Jasa</h1>
    <a href="{{ route('services.create') }}" class="btn btn-primary">Tambah Jasa</a>
</div>

@if ($message = Session::get('success'))
  <div class="alert alert-success">{{ $message }}</div>
@endif

<table class="table table-bordered">
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
    @foreach ($services as $service)
    <tr>
      <td>{{ $service->id }}</td>
      <td>{{ $service->nama_jasa }}</td>
      <td>{{ $service->deskripsi }}</td>
      <td>{{ number_format($service->harga, 2) }}</td>
      <td>
          <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
          <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
          </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

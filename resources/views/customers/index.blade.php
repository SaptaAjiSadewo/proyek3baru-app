@extends('layouts.admin')

@section('content')
<div class="mb-3">
    <h1>Data Pelanggan</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-primary">Tambah Pelanggan</a>
</div>

@if ($message = Session::get('success'))
  <div class="alert alert-success">{{ $message }}</div>
@endif

<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Telepon</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($customers as $customer)
    <tr>
      <td>{{ $customer->id }}</td>
      <td>{{ $customer->nama }}</td>
      <td>{{ $customer->email }}</td>
      <td>{{ $customer->telepon }}</td>
      <td>
          <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning btn-sm">Edit</a>
          <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline-block;">
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

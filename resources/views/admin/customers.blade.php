@extends('layouts.admin')

@section('content')
  <h1>Akun Pelanggan</h1>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Telepon</th>
        <th>Dibuat</th>
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

@extends('layouts.admin')

@section('content')
<div class="container">
   <h1>Tambah Pelanggan</h1>
   @if ($errors->any())
     <div class="alert alert-danger">
       <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
       </ul>
     </div>
   @endif
   <form action="{{ route('customers.store') }}" method="POST">
     @csrf
     <div class="mb-3">
       <label for="nama" class="form-label">Nama</label>
       <input type="text" name="nama" class="form-control" required>
     </div>
     <div class="mb-3">
       <label for="email" class="form-label">Email</label>
       <input type="email" name="email" class="form-control" required>
     </div>
     <div class="mb-3">
       <label for="telepon" class="form-label">Telepon</label>
       <input type="text" name="telepon" class="form-control">
     </div>
     <button type="submit" class="btn btn-primary">Simpan</button>
   </form>
</div>
@endsection

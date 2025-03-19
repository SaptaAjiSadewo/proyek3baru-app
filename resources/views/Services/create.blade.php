@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tambah Jasa</h1>
    @if ($errors->any())
       <div class="alert alert-danger">
          <ul>
             @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
             @endforeach
          </ul>
       </div>
    @endif
    <form action="{{ route('services.store') }}" method="POST">
         @csrf
         <div class="mb-3">
            <label for="nama_jasa" class="form-label">Nama Jasa</label>
            <input type="text" name="nama_jasa" class="form-control" required>
         </div>
         <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3"></textarea>
         </div>
         <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" step="0.01" name="harga" class="form-control" required>
         </div>
         <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

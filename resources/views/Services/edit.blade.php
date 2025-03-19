@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Jasa</h1>
    @if ($errors->any())
       <div class="alert alert-danger">
          <ul>
             @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
             @endforeach
          </ul>
       </div>
    @endif
    <form action="{{ route('services.update', $service->id) }}" method="POST">
         @csrf
         @method('PUT')
         <div class="mb-3">
            <label for="nama_jasa" class="form-label">Nama Jasa</label>
            <input type="text" name="nama_jasa" class="form-control" value="{{ $service->nama_jasa }}" required>
         </div>
         <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3">{{ $service->deskripsi }}</textarea>
         </div>
         <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" step="0.01" name="harga" class="form-control" value="{{ $service->harga }}" required>
         </div>
         <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection

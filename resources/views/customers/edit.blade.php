@extends('layouts.admin')

@section('content')
<div class="container">
   <h1>Edit Pelanggan</h1>
   @if ($errors->any())
     <div class="alert alert-danger">
       <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
       </ul>
     </div>
   @endif
   <form action="{{ route('customers.update', $customer->id) }}" method="POST">
     @csrf
     @method('PUT')
     <div class="mb-3">
       <label for="nama" class="form-label">Nama</label>
       <input type="text" name="nama" class="form-control" value="{{ $customer->nama }}" required>
     </div>
     <div class="mb-3">
       <label for="email" class="form-label">Email</label>
       <input type="email" name="email" class="form-control" value="{{ $customer->email }}" required>
     </div>
     <div class="mb-3">
       <label for="telepon" class="form-label">Telepon</label>
       <input type="text" name="telepon" class="form-control" value="{{ $customer->telepon }}">
     </div>
     <button type="submit" class="btn btn-primary">Perbarui</button>
   </form>
</div>
@endsection

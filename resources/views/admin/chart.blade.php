@extends('layouts.admin')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <!-- Link Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <!-- Card Bootstrap 5 -->
    <div class="card">
        <div class="card-header">
            Statistik Data
        </div>
        <div class="card-body">
            <h5 class="card-title">Data Akun dan Jasa</h5>
            <p class="card-text">Total Akun Pengguna: <strong>{{ $totalCustomers }}</strong></p>
            <p class="card-text">Total Jasa: <strong>{{ $totalServices }}</strong></p>
        </div>
    </div>
</div>

<!-- Link Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

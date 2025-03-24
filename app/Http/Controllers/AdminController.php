<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Service;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Menampilkan dashboard utama
    public function index()
    {
        $customers = Customer::all();
        $services  = Service::all();

        $totalCustomers = Customer::count();
        $totalServices  = Service::count();

        $pesanans = Pesanan::all();
        return view('admin.dashboard', compact('customers', 'services', 'totalCustomers', 'totalServices','pesanans'));
    }

    // Method untuk menampilkan halaman Akun Pelanggan
    public function customers()
    {
        $customers = Customer::all();
        return view('admin.customers', compact('customers'));
    }

    // Method untuk menampilkan halaman Jasa
    public function services()
    {
        $services = Service::all();
        return view('admin.services', compact('services'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Service;
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
        return view('admin.dashboard', compact('customers', 'services', 'totalCustomers', 'totalServices'));
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

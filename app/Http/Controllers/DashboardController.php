<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total data di tabel customer dan service
        $totalCustomers = DB::table('customers')->count();
        $totalServices  = DB::table('services')->count();

        $customers = DB::table('customers')->get();
        $services  = DB::table('services')->get();

        // Kirim data ke view
        return view('dashboardchart',  compact('totalCustomers', 'totalServices', 'customers', 'services'));
    }
}
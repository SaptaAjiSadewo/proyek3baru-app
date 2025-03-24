<?php

namespace App\Http\Controllers\API;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    // Menampilkan daftar pelanggan
    public function index()
    {
        $customers = Customer::all();
        return response()->json(['data' => $customers], 200);
    }

    // Menyimpan data pelanggan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'    => 'required',
            'email'   => 'required|email|unique:customers,email',
            'telepon' => 'nullable'
        ]);

        $customer = Customer::create($validated);

        return response()->json([
            'data'    => $customer,
            'message' => 'Pelanggan berhasil ditambahkan.'
        ], 201);
    }

    // Menampilkan detail pelanggan
    public function show(Customer $customer)
    {
        return response()->json(['data' => $customer], 200);
    }

    // Memperbarui data pelanggan
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'nama'    => 'required',
            'email'   => 'required|email|unique:customers,email,'.$customer->id,
            'telepon' => 'nullable'
        ]);

        $customer->update($validated);

        return response()->json([
            'data'    => $customer,
            'message' => 'Pelanggan berhasil diperbarui.'
        ], 200);
    }

    // Menghapus pelanggan
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json([
            'message' => 'Pelanggan berhasil dihapus.'
        ], 200);
    }
}

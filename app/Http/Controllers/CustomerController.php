<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    // Menampilkan daftar pelanggan
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // Menampilkan form untuk menambahkan pelanggan
    public function create()
    {
        return view('customers.create');
    }

    // Menyimpan data pelanggan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required',
            'email'   => 'required|email|unique:customers,email',
            'telepon' => 'nullable'
        ]);

        Customer::create($request->all());
        return redirect()->route('customers.index')
                         ->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    // Menampilkan detail pelanggan (opsional)
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    // Menampilkan form untuk mengedit pelanggan
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    // Memperbarui data pelanggan
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'nama'    => 'required',
            'email'   => 'required|email|unique:customers,email,'.$customer->id,
            'telepon' => 'nullable'
        ]);

        $customer->update($request->all());
        return redirect()->route('customers.index')
                         ->with('success', 'Pelanggan berhasil diperbarui.');
    }

    // Menghapus pelanggan
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')
                         ->with('success', 'Pelanggan berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    // Menampilkan daftar jasa
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    // Menampilkan form untuk menambahkan jasa
    public function create()
    {
        return view('services.create');
    }

    // Menyimpan data jasa baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_jasa' => 'required',
            'deskripsi' => 'nullable',
            'harga'     => 'required|numeric'
        ]);

        Service::create($request->all());
        return redirect()->route('services.index')
                         ->with('success', 'Jasa berhasil ditambahkan.');
    }

    // Menampilkan detail jasa (opsional)
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    // Menampilkan form untuk mengedit jasa
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    // Memperbarui data jasa
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'nama_jasa' => 'required',
            'deskripsi' => 'nullable',
            'harga'     => 'required|numeric'
        ]);

        $service->update($request->all());
        return redirect()->route('services.index')
                         ->with('success', 'Jasa berhasil diperbarui.');
    }

    // Menghapus jasa
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')
                         ->with('success', 'Jasa berhasil dihapus.');
    }
}

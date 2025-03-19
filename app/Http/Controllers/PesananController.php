<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;


class PesananController extends Controller
{
    // Tampilkan daftar pesanan
    public function index()
    {
        $pesanans = Pesanan::all();
        $totalCustomers = Customer::count();
        $totalServices  = Service::count();
        $customers = Customer::all();
        $services  = Service::all();

        // Kirim ke view
        return view('Pesanan.index', compact('pesanans', 'totalCustomers', 'totalServices', 'customers', 'services'));
    }

    // Tampilkan form untuk membuat pesanan baru
    public function create()
    {
        return view('pesanan.create');
    }

    // Simpan pesanan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'              => 'required|string|max:255',
            'alamat'            => 'required|string',
            'no_telepon'        => 'required|string|max:20',
            'total_pembayaran'  => 'required|numeric',
            'metode_pembayaran' => 'required|string|max:50',
            'layanan_dipesan'   => 'required|string|max:255',
            'waktu_pemesanan'   => 'required|date',
            'status'            => 'required|string|max:50',
            'bukti_transfer'    => 'nullable|image|max:2048',
            'catatan'           => 'nullable|string',
        ]);

        if ($request->hasFile('bukti_transfer')) {
            $file = $request->file('bukti_transfer');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public', $filename);
            $validated['bukti_transfer'] = $filename;
        }

        Pesanan::create($validated);

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil ditambahkan');
    }

    // Tampilkan detail pesanan (opsional)
    public function show($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('pesanan.show', compact('pesanan'));
    }

    // Tampilkan form edit untuk pesanan
    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('pesanan.edit', compact('pesanan'));
    }

    // Update data pesanan
    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $validated = $request->validate([
            'nama'              => 'required|string|max:255',
            'alamat'            => 'required|string',
            'no_telepon'        => 'required|string|max:20',
            'total_pembayaran'  => 'required|numeric',
            'metode_pembayaran' => 'required|string|max:50',
            'layanan_dipesan'   => 'required|string|max:255',
            'waktu_pemesanan'   => 'required|date',
            'status'            => 'required|string|max:50',
            'bukti_transfer'    => 'nullable|image|max:2048',
            'catatan'           => 'nullable|string',
        ]);

        if ($request->hasFile('bukti_transfer')) {
            // Hapus file lama jika ada
            if ($pesanan->bukti_transfer) {
                Storage::delete('public/'.$pesanan->bukti_transfer);
            }
            $file = $request->file('bukti_transfer');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public', $filename);
            $validated['bukti_transfer'] = $filename;
        }

        $pesanan->update($validated);

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diupdate');
    }

    // Hapus pesanan
    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        if ($pesanan->bukti_transfer) {
            Storage::delete('public/'.$pesanan->bukti_transfer);
        }
        $pesanan->delete();
        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus');
    }
}

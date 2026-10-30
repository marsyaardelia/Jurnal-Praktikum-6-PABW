<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporBanjirController extends Controller
{
    public function index()
    {
        $laporan = Laporan::latest()->get();
        return view('laporan.index', compact('laporan'));
    }

    public function create()
    {
        return view('laporan.create');
    }

    public function konfirmasi(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tingkat_keparahan' => 'required|in:rendah,sedang,tinggi',
        ]);

        return view('laporan.konfirmasi', ['data' => $validated]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tingkat_keparahan' => 'required|in:rendah,sedang,tinggi',
        ]);

        Laporan::create($validated);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dikirim!');
    }

    public function updateStatus(Request $request, Laporan $laporan)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai',
        ]);

        $laporan->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui!');
    }

    public function destroy(Laporan $laporan)
    {
        $laporan->delete();
        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
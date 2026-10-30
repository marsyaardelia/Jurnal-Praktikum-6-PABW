@extends('layouts.app')

@section('content')
    <div class="section-title">Form Lapor Kejadian Banjir</div>

    <form action="{{ route('laporan.konfirmasi') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label form-custom-label">Nama Pelapor:</label>
            <input type="text" name="nama_pelapor" class="form-control form-custom-input" placeholder="Masukkan nama lengkap" value="{{ old('nama_pelapor', auth()->user()->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label form-custom-label">Lokasi Kejadian (Kecamatan):</label>
            <input type="text" name="lokasi" class="form-control form-custom-input" placeholder="Contoh: Dayeuhkolot" value="{{ old('lokasi') }}" required>
        </div>

        <div class="mb-4">
            <label class="form-label form-custom-label">Tinggi Genangan Air (cm):</label>
            <input type="text" name="deskripsi" class="form-control form-custom-input" placeholder="Masukkan ketinggian air" value="{{ old('deskripsi') }}" required>
            <input type="hidden" name="tingkat_keparahan" value="sedang">
        </div>

        <button type="submit" class="btn-submit-blue">Kirim Laporan</button>
    </form>
@endsection
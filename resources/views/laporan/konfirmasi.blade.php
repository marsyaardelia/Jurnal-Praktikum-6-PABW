@extends('layouts.app')

@section('content')
    <div class="alert-custom-success">
        Success: Laporan kejadian banjir Anda berhasil dikirim dan dicatat oleh sistem!
    </div>

    <div class="section-title">Rincian Laporan yang Dikirim</div>

    <div class="report-card mb-4">
        <span class="badge-status badge-siaga">Siaga</span>

        <div class="report-pelapor">Pelapor: {{ $data['nama_pelapor'] }}</div>
        <div class="report-lokasi">Lokasi: {{ $data['lokasi'] }}</div>

        <div class="report-divider"></div>

        <div class="report-detail-label">
            Ketinggian Air: <span class="report-detail-val">{{ $data['deskripsi'] }}</span>
        </div>
        <div class="report-detail-label">
            Tanggal Kejadian: <span class="report-detail-val">{{ date('Y-m-d') }}</span>
        </div>
    </div>

    <form action="{{ route('laporan.store') }}" method="POST">
        @csrf
        <input type="hidden" name="nama_pelapor" value="{{ $data['nama_pelapor'] }}">
        <input type="hidden" name="lokasi" value="{{ $data['lokasi'] }}">
        <input type="hidden" name="tingkat_keparahan" value="{{ $data['tingkat_keparahan'] }}">
        <input type="hidden" name="deskripsi" value="{{ $data['deskripsi'] }}">

        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('laporan.index') }}" class="text-decoration-none fw-semibold" style="color: #2563eb; font-size: 0.9rem;">
                &larr; Kembali ke Daftar Laporan
            </a>
            <button type="submit" class="btn btn-success px-4" style="border-radius: 8px;">Simpan Laporan</button>
        </div>
    </form>
@endsection
@extends('layouts.app')

@section('content')
    <div class="section-title">Daftar Laporan Banjir Terkini</div>

    @if(session('success'))
        <div class="alert-custom-success">
            Success: {{ session('success') }}
        </div>
    @endif

    @forelse($laporan as $item)
        @include('partials.laporan-card', ['item' => $item])
    @empty
        <div class="text-center text-muted py-4">
            Belum ada laporan banjir yang tercatat.
        </div>
    @endforelse
@endsection
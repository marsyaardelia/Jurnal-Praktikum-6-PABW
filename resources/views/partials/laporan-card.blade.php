<div class="report-card">
    {{-- Status Badge (Awas / Siaga / Waspada) --}}
    @if(strtolower($item->tingkat_keparahan) == 'tinggi' || strtolower($item->status) == 'awas')
        <span class="badge-status badge-awas">Awas</span>
    @elseif(strtolower($item->tingkat_keparahan) == 'sedang' || strtolower($item->status) == 'siaga')
        <span class="badge-status badge-siaga">Siaga</span>
    @else
        <span class="badge-status badge-waspada">Waspada</span>
    @endif

    <div class="report-pelapor">Pelapor: {{ $item->nama_pelapor }}</div>
    <div class="report-lokasi">Lokasi: {{ $item->lokasi }}</div>

    <div class="report-divider"></div>

    <div class="report-detail-label">
        Ketinggian Air: <span class="report-detail-val">{{ $item->deskripsi }}</span>
    </div>
    <div class="report-detail-label">
        Tanggal Kejadian: <span class="report-detail-val">{{ $item->created_at->format('Y-m-d') }}</span>
    </div>

    @auth
    <div class="d-flex justify-content-end gap-2 mt-3 pt-2 border-top">
        <form action="{{ route('laporan.updateStatus', $item->id) }}" method="POST" class="d-flex align-items-center gap-2">
            @csrf
            @method('PATCH')
            <select name="status" class="form-select form-select-sm" style="width: auto; font-size: 0.8rem;">
                <option value="menunggu" {{ $item->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="diproses" {{ $item->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            <button type="submit" class="btn btn-sm btn-outline-secondary" style="font-size: 0.75rem;">Update</button>
        </form>

        <form action="{{ route('laporan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus laporan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger" style="font-size: 0.75rem;">Hapus</button>
        </form>
    </div>
    @endauth
</div>
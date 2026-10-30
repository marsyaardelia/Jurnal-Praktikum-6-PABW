<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaporBanjir - BPBD Kabupaten Bandung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f5f9;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #334155;
        }

        /* Header Style */
        .header-bg {
            background-color: #2563eb;
            color: #ffffff;
            padding: 35px 20px 45px;
            text-align: center;
        }

        .header-title {
            font-weight: 800;
            font-size: 1.65rem;
            margin-bottom: 4px;
        }

        .header-subtitle {
            font-size: 0.85rem;
            opacity: 0.9;
            margin-bottom: 20px;
        }

        /* Pill Navigation Buttons */
        .btn-nav-pill {
            background-color: rgba(255, 255, 255, 0.25);
            color: #ffffff;
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 50px;
            padding: 6px 20px;
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-block;
        }

        .btn-nav-pill:hover, .btn-nav-pill.active {
            background-color: #ffffff;
            color: #2563eb;
            border-color: #ffffff;
        }

        /* White Main Container Card */
        .main-card {
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            padding: 32px 36px;
            margin-top: -20px;
            margin-bottom: 40px;
            border: none;
        }

        .section-title {
            font-weight: 700;
            font-size: 1.25rem;
            color: #1e293b;
            margin-bottom: 24px;
        }

        /* Laporan Card Item */
        .report-card {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px 24px;
            margin-bottom: 16px;
            background-color: #ffffff;
            position: relative;
        }

        .report-pelapor {
            font-weight: 700;
            font-size: 1.05rem;
            color: #0f172a;
            margin-bottom: 2px;
        }

        .report-lokasi {
            font-size: 0.875rem;
            color: #64748b;
            margin-bottom: 16px;
        }

        .report-divider {
            border-top: 1px dashed #e2e8f0;
            margin: 12px 0;
        }

        .report-detail-label {
            font-size: 0.825rem;
            color: #64748b;
            margin-bottom: 2px;
        }

        .report-detail-val {
            font-weight: 700;
            color: #1e293b;
        }

        /* Status Badges */
        .badge-status {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 4px 14px;
            border-radius: 20px;
            position: absolute;
            top: 20px;
            right: 24px;
        }

        .badge-awas {
            background-color: #ffe4e6;
            color: #e11d48;
        }

        .badge-siaga {
            background-color: #fef3c7;
            color: #d97706;
        }

        .badge-waspada {
            background-color: #e0f2fe;
            color: #0284c7;
        }

        /* Custom Form Inputs */
        .form-custom-label {
            font-weight: 700;
            font-size: 0.9rem;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .form-custom-input {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 10px 16px;
            font-size: 0.9rem;
            color: #334155;
        }

        .form-custom-input:focus {
            background-color: #ffffff;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .btn-submit-blue {
            background-color: #2563eb;
            color: #ffffff;
            font-weight: 600;
            padding: 10px;
            border-radius: 8px;
            border: none;
            width: 100%;
            transition: background-color 0.2s;
        }

        .btn-submit-blue:hover {
            background-color: #1d4ed8;
            color: #ffffff;
        }

        /* Alert Banner */
        .alert-custom-success {
            background-color: #dcfce7;
            color: #15803d;
            border: none;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            padding: 12px 20px;
            margin-bottom: 24px;
        }

        .footer-text {
            text-align: center;
            font-size: 0.8rem;
            color: #94a3b8;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <div class="header-bg">
        <div class="header-title">LaporBanjir - BPBD Kabupaten Bandung</div>
        <div class="header-subtitle">Portal Warga Cepat Tanggap Banjir</div>
        <div class="d-flex justify-content-center gap-2">
            <a href="{{ route('laporan.index') }}" class="btn-nav-pill {{ request()->routeIs('laporan.index') ? 'active' : '' }}">Daftar Laporan</a>
            <a href="{{ route('laporan.create') }}" class="btn-nav-pill {{ request()->routeIs('laporan.create') ? 'active' : '' }}">Buat Laporan Baru</a>
            @auth
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn-nav-pill" style="border:none; cursor:pointer;">Logout</button>
                </form>
            @endauth
        </div>
    </div>

    <!-- Main Content Container -->
    <div class="container" style="max-width: 900px;">
        <div class="main-card">
            @yield('content')
        </div>

        <div class="footer-text">
            &copy; 2026 BPBD Kabupaten Bandung - Sistem Pelaporan Banjir Sederhana
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
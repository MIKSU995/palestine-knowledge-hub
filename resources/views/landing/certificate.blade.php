<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sertifikat Kelulusan — {{ $attempt->quiz->title ?? 'Edukasi Palestina' }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700;900&family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0f172a;
        }
        .certificate-font-heading {
            font-family: 'Cinzel', serif;
        }
        .certificate-border {
            border: 12px double #dc2626;
        }
        @media print {
            body {
                background: #ffffff !important;
                padding: 0 !important;
            }
            .no-print {
                display: none !important;
            }
            .certificate-container {
                box-shadow: none !important;
                border: 8px double #dc2626 !important;
                width: 100% !important;
                max-width: 100% !important;
                margin: 0 !important;
            }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center p-4 sm:p-8">

    {{-- Action Bar (No Print) --}}
    <div class="no-print w-full max-w-4xl mb-6 flex items-center justify-between">
        <a href="{{ route('learning.dashboard') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-300 hover:text-white transition">
            ← Kembali ke Dashboard Pembelajaran
        </a>

        <button onclick="window.print()" class="px-6 py-2.5 bg-red-600 hover:bg-red-500 text-white font-bold text-xs rounded-xl shadow-lg shadow-red-900/50 transition flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
            Cetak / Unduh PDF Sertifikat
        </button>
    </div>

    {{-- Certificate Container --}}
    <div class="certificate-container w-full max-w-4xl bg-white text-slate-900 rounded-3xl p-8 sm:p-14 shadow-2xl relative overflow-hidden certificate-border">
        
        {{-- Watermark & Ambient Accents --}}
        <div class="absolute inset-0 opacity-5 pointer-events-none flex items-center justify-center">
            <span class="text-9xl font-black">🇵🇸</span>
        </div>

        {{-- Header Badge --}}
        <div class="text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-red-100 text-red-700 text-xs font-extrabold uppercase tracking-widest mb-4">
                🇮🇩 PALESTINE KNOWLEDGE HUB • KARYA ANAK INDONESIA
            </div>

            <h1 class="text-3xl sm:text-5xl font-black text-slate-900 uppercase tracking-widest certificate-font-heading">
                Sertifikat Kelulusan
            </h1>
            <p class="text-xs sm:text-sm font-bold text-red-600 uppercase tracking-widest mt-2">
                Certificate of Palestinian Knowledge Achievement
            </p>
        </div>

        {{-- Divider --}}
        <div class="w-32 h-1 bg-red-600 mx-auto my-8 rounded-full"></div>

        {{-- Recipient Info --}}
        <div class="text-center space-y-4">
            <p class="text-xs sm:text-sm font-medium text-slate-500 uppercase tracking-wider">
                Diberikan Secara Resmi Kepada:
            </p>

            <h2 class="text-3xl sm:text-5xl font-extrabold text-slate-900 border-b-2 border-slate-200 inline-block px-8 pb-2">
                {{ $attempt->user->name ?? 'Peserta Edukasi' }}
            </h2>

            <p class="text-sm sm:text-base text-slate-600 max-w-2xl mx-auto leading-relaxed pt-3">
                Atas keberhasilan dan dedikasi dalam menyelesaikan kuis evaluasi wawasan sejarah dan kebudayaan Palestina:
            </p>

            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 max-w-xl mx-auto my-4">
                <h3 class="text-lg sm:text-xl font-extrabold text-red-700">
                    "{{ $attempt->quiz->title ?? 'Evaluasi Wawasan Palestina' }}"
                </h3>
                <div class="flex items-center justify-center gap-6 mt-2 text-xs font-bold text-slate-600">
                    <span>Skor Akhir: <strong class="text-slate-900 text-sm">{{ $attempt->score }}%</strong></span>
                    <span>•</span>
                    <span>Status: <strong class="text-green-600 text-sm">LULUS (PASSED)</strong></span>
                </div>
            </div>
        </div>

        {{-- Signatures & Metadata --}}
        <div class="mt-12 pt-8 border-t border-slate-200 grid sm:grid-cols-2 gap-8 items-end">
            <div class="text-left text-xs text-slate-500 space-y-1">
                <p>No. Verifikasi: <strong class="text-slate-900 font-mono">PKH-CERT-{{ str_pad($attempt->id, 6, '0', STR_PAD_LEFT) }}</strong></p>
                <p>Tanggal Diterbitkan: <strong class="text-slate-900">{{ optional($attempt->completed_at)->format('d F Y') ?? date('d F Y') }}</strong></p>
                <p class="text-[10px] text-slate-400 mt-2">Diverifikasi secara digital oleh Palestine Knowledge Hub Platform.</p>
            </div>

            <div class="text-right">
                <div class="inline-block text-center">
                    <div class="h-12 flex items-center justify-center mb-1">
                        <span class="text-2xl font-serif text-red-600 italic font-bold">Palestine Hub ID</span>
                    </div>
                    <div class="w-48 h-0.5 bg-slate-900 mb-1"></div>
                    <p class="text-xs font-bold text-slate-900">Tim Edukasi Kemanusiaan</p>
                    <p class="text-[10px] text-slate-500 uppercase tracking-wider">Karya Anak Indonesia</p>
                </div>
            </div>
        </div>

    </div>

</body>
</html>

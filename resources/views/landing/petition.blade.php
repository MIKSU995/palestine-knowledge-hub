@extends('layouts.app')

@section('title', 'Petisi Solidaritas Palestina | Palestine Knowledge Hub')
@section('meta_description', 'Bergabunglah dalam petisi solidaritas untuk rakyat Palestina. Suarakan kepedulian Anda melalui tanda tangan digital yang bermakna.')

@section('content')

{{-- Hero --}}
<section class="relative py-20 bg-slate-900 overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_left,_var(--tw-gradient-stops))] from-red-900/40 via-slate-900 to-slate-950"></div>
    <div class="absolute top-10 right-10 w-96 h-96 bg-red-600/10 rounded-full blur-3xl animate-pulse"></div>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-8 z-10">
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-1.5 rounded-full bg-red-500/20 border border-red-500/30 text-red-300 font-extrabold text-xs uppercase tracking-widest mb-5">
                ✍️ Petisi & Solidaritas
            </span>
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight">
                Suarakan Kepedulian<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-rose-300">Bersama Kita</span>
            </h1>
            <p class="mt-5 text-slate-300 text-base sm:text-lg leading-relaxed">
                Setiap tanda tangan adalah suara. Setiap suara adalah harapan. Bergabunglah dengan ribuan orang yang berdiri bersama rakyat Palestina dalam perjuangan kemanusiaan ini.
            </p>
        </div>

        {{-- Stats Banner --}}
        <div class="mt-12 grid grid-cols-3 gap-6 max-w-lg">
            @php $totalSigs = $petitions->sum('signature_count'); @endphp
            <div class="text-center">
                <div class="text-3xl font-black text-white">{{ number_format($totalSigs) }}</div>
                <div class="text-xs text-slate-400 mt-1">Total Tanda Tangan</div>
            </div>
            <div class="text-center border-x border-slate-700">
                <div class="text-3xl font-black text-white">{{ $petitions->count() }}</div>
                <div class="text-xs text-slate-400 mt-1">Petisi Aktif</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-black text-white">🌍</div>
                <div class="text-xs text-slate-400 mt-1">Dari Seluruh Dunia</div>
            </div>
        </div>
    </div>
</section>

{{-- Petitions List --}}
<section class="py-16 bg-slate-50 dark:bg-slate-950">
    <div class="max-w-5xl mx-auto px-6 lg:px-8 space-y-10">

        @forelse($petitions as $petition)
        <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden hover:shadow-xl transition duration-300" id="petition-{{ $petition->id }}">

            {{-- Header --}}
            <div class="p-8 border-b border-slate-100 dark:border-slate-800">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-green-500 animate-pulse"></span>
                            <span class="text-xs font-bold text-green-600 dark:text-green-400 uppercase tracking-wider">Petisi Aktif</span>
                        </div>
                        <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white">{{ $petition->title }}</h2>
                        <p class="text-slate-600 dark:text-slate-400 text-sm mt-2 leading-relaxed max-w-2xl">
                            {{ $petition->description }}
                        </p>
                    </div>
                </div>

                {{-- Progress Bar --}}
                <div class="mt-6">
                    <div class="flex items-center justify-between text-sm mb-2">
                        <span class="font-extrabold text-slate-900 dark:text-white">
                            <span class="text-2xl text-red-600 petition-count-{{ $petition->id }}">{{ number_format($petition->signature_count) }}</span>
                            <span class="text-slate-500 dark:text-slate-400 ml-1">tanda tangan</span>
                        </span>
                        <span class="text-slate-500 dark:text-slate-400 text-xs">
                            Target: {{ number_format($petition->target_signatures) }}
                        </span>
                    </div>
                    <div class="h-3 bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-red-600 to-rose-500 rounded-full transition-all duration-1000 petition-progress-{{ $petition->id }}"
                             style="width: {{ $petition->progress_percent }}%"></div>
                    </div>
                    <div class="flex items-center justify-between mt-1.5">
                        <span class="text-xs text-slate-400">{{ $petition->progress_percent }}% dari target</span>
                        <span class="text-xs text-red-600 dark:text-red-400 font-bold">
                            {{ number_format((int)$petition->target_signatures - $petition->signature_count) }} lagi diperlukan
                        </span>
                    </div>
                </div>
            </div>

            {{-- Sign Form --}}
            <div class="p-8">
                @if(session('success') && request()->is('*/petition*'))
                <div class="mb-6 p-4 rounded-2xl bg-green-50 dark:bg-green-950/30 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-400 text-sm flex items-start gap-3">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ session('success') }}
                </div>
                @endif

                <h3 class="text-sm font-extrabold text-slate-500 dark:text-slate-400 uppercase tracking-wider mb-5">
                    Tambahkan Tanda Tangan Anda
                </h3>

                <form action="{{ route('petition.sign', $petition->id) }}" method="POST"
                      class="petition-form" data-petition="{{ $petition->id }}">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" name="name" required
                                   placeholder="Masukkan nama Anda..."
                                   class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white placeholder-slate-400 text-sm outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">Email <span class="text-slate-400 font-normal">(opsional)</span></label>
                            <input type="email" name="email"
                                   placeholder="email@contoh.com"
                                   class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white placeholder-slate-400 text-sm outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">Kota</label>
                            <input type="text" name="city"
                                   placeholder="Jakarta, Surabaya, dll..."
                                   class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white placeholder-slate-400 text-sm outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">Negara</label>
                            <select name="country"
                                    class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white text-sm outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition">
                                <option value="Indonesia">🇮🇩 Indonesia</option>
                                <option value="Malaysia">🇲🇾 Malaysia</option>
                                <option value="Brunei">🇧🇳 Brunei Darussalam</option>
                                <option value="Singapura">🇸🇬 Singapura</option>
                                <option value="Lainnya">🌍 Negara Lain</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-5">
                        <label class="block text-xs font-semibold text-slate-600 dark:text-slate-400 mb-1.5">Pesan Dukungan <span class="text-slate-400 font-normal">(opsional)</span></label>
                        <textarea name="message" rows="3"
                                  placeholder="Tuliskan pesan dukungan Anda untuk rakyat Palestina..."
                                  class="w-full px-4 py-3 rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white placeholder-slate-400 text-sm outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition resize-none"></textarea>
                    </div>
                    <div class="flex items-center justify-between gap-4 flex-wrap">
                        <p class="text-xs text-slate-400">
                            🔒 Data Anda aman dan tidak akan dibagikan ke pihak ketiga.
                        </p>
                        <button type="submit"
                                class="px-8 py-3 bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 text-white font-extrabold rounded-2xl text-sm transition shadow-lg shadow-red-900/30 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                            Tandatangani Sekarang
                        </button>
                    </div>
                </form>

                {{-- Share this petition --}}
                <div class="mt-6 pt-6 border-t border-slate-100 dark:border-slate-800">
                    <p class="text-xs text-slate-500 dark:text-slate-400 font-semibold mb-3">Sebarkan petisi ini:</p>
                    <div class="flex items-center gap-2 flex-wrap">
                        <a href="https://wa.me/?text={{ urlencode($petition->title . ' — Tandatangani petisi ini: ' . route('petition')) }}"
                           target="_blank"
                           class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-green-500/10 hover:bg-green-500/20 text-green-700 dark:text-green-400 text-xs font-bold border border-green-200 dark:border-green-800 transition">
                            📱 WhatsApp
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($petition->title) }}&url={{ urlencode(route('petition')) }}&hashtags=FreePalestine,PalestineKnowledgeHub"
                           target="_blank"
                           class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 text-xs font-bold border border-slate-200 dark:border-slate-700 transition">
                            🐦 Twitter/X
                        </a>
                        <button onclick="navigator.clipboard.writeText('{{ route('petition') }}').then(()=>alert('Link petisi berhasil disalin!'))"
                                class="inline-flex items-center gap-1.5 px-3 py-2 rounded-lg bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 text-xs font-bold border border-slate-200 dark:border-slate-700 transition">
                            🔗 Salin Link
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-20">
            <div class="text-5xl mb-4">📋</div>
            <h3 class="text-xl font-bold text-slate-900 dark:text-white">Tidak ada petisi aktif saat ini</h3>
            <p class="text-slate-500 dark:text-slate-400 text-sm mt-2">Silakan kembali lagi nanti.</p>
        </div>
        @endforelse
    </div>
</section>

{{-- Why Sign Section --}}
<section class="py-16 bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-slate-900 dark:text-white">Mengapa Tanda Tangan Anda Penting?</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm mt-2 max-w-xl mx-auto">Setiap suara berkontribusi pada tekanan moral internasional yang nyata</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center p-8 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700">
                <div class="text-4xl mb-4">📢</div>
                <h3 class="font-extrabold text-slate-900 dark:text-white text-base mb-2">Amplifikasi Suara</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Petisi dengan jumlah tanda tangan besar mendapat perhatian media dan pembuat kebijakan internasional.</p>
            </div>
            <div class="text-center p-8 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700">
                <div class="text-4xl mb-4">🤝</div>
                <h3 class="font-extrabold text-slate-900 dark:text-white text-base mb-2">Solidaritas Nyata</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Rakyat Palestina melihat dukungan global sebagai sumber kekuatan moral yang sangat berarti bagi mereka.</p>
            </div>
            <div class="text-center p-8 rounded-2xl bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700">
                <div class="text-4xl mb-4">📖</div>
                <h3 class="font-extrabold text-slate-900 dark:text-white text-base mb-2">Edukasi Publik</h3>
                <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">Menyebarkan petisi berarti juga menyebarkan kesadaran tentang situasi nyata di Palestina.</p>
            </div>
        </div>
    </div>
</section>

@endsection

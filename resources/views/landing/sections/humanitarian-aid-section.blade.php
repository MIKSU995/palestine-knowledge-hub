<section id="humanitarian-hub" class="py-20 bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-white transition-colors duration-200 border-b border-slate-200 dark:border-slate-800 relative overflow-hidden w-full max-w-full">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-rose-100 dark:bg-rose-950/80 border border-rose-200 dark:border-rose-900/60 text-rose-700 dark:text-rose-300 text-xs font-extrabold uppercase tracking-wider mb-4">
                <svg class="w-4 h-4 fill-current text-rose-600 dark:text-rose-400" viewBox="0 0 20 20"><path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/></svg>
                <span>Pusat Akses & Solidaritas Kemanusiaan</span>
            </div>
            
            <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                Bantuan Kemanusiaan & Donasi Terverifikasi
            </h2>
            
            <p class="mt-4 text-slate-600 dark:text-slate-300 text-base sm:text-lg leading-relaxed">
                Salurkan bantuan terbaik Anda melalui lembaga resmi terpercaya untuk mendukung pasokan medis darurat, kebutuhan air bersih, dan fasilitas kesehatan rakyat Gaza & Palestina.
            </p>
        </div>

        <!-- 1. Interactive Humanitarian Impact Calculator -->
        <div class="bg-gradient-to-br from-emerald-900 via-slate-900 to-slate-950 rounded-3xl p-6 sm:p-10 text-white shadow-2xl mb-16 border border-emerald-800/50 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="grid lg:grid-cols-12 gap-8 items-center relative z-10">
                
                <div class="lg:col-span-7">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider mb-3">
                        ⚡ Simulasi Dampak Kemanusiaan
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Hitung Estimasi Kontribusi Kebaikan Anda</h3>
                    <p class="text-slate-300 text-sm mt-2 leading-relaxed">
                        Pilih nominal bantuan untuk melihat secara langsung manfaat yang dapat disalurkan kepada pengungsi dan korban darurat medis di Gaza.
                    </p>

                    <!-- Amount Selection Pills -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mt-6">
                        <button onclick="setAidImpact(50000, '1 Paket Pangan Darurat & Air Bersih 10L')" class="aid-amt-btn active p-3 rounded-2xl bg-emerald-600 text-white font-extrabold text-xs sm:text-sm shadow-lg transition">
                            Rp 50.000
                        </button>
                        <button onclick="setAidImpact(150000, 'Kit Pertolongan Pertama Medis & Balut Luka')" class="aid-amt-btn p-3 rounded-2xl bg-slate-800 hover:bg-slate-700 text-slate-200 font-bold text-xs sm:text-sm border border-slate-700 transition">
                            Rp 150.000
                        </button>
                        <button onclick="setAidImpact(500000, 'Paket Nutrisi Bayi & Selimut Musim Dingin')" class="aid-amt-btn p-3 rounded-2xl bg-slate-800 hover:bg-slate-700 text-slate-200 font-bold text-xs sm:text-sm border border-slate-700 transition">
                            Rp 500.000
                        </button>
                        <button onclick="setAidImpact(1000000, 'Operasional Farmasi Darurat & Ambulans')" class="aid-amt-btn p-3 rounded-2xl bg-slate-800 hover:bg-slate-700 text-slate-200 font-bold text-xs sm:text-sm border border-slate-700 transition">
                            Rp 1.000.000
                        </button>
                    </div>
                </div>

                <!-- Right Impact Result Display -->
                <div class="lg:col-span-5 bg-slate-900/90 backdrop-blur-md rounded-2xl p-6 border border-emerald-500/30 text-center flex flex-col justify-between">
                    <div>
                        <span class="text-xs text-emerald-400 font-bold uppercase tracking-wider">Estimasi Penyaluran</span>
                        <div id="impact-amount" class="text-3xl font-black text-white mt-1">Rp 50.000</div>
                        <div class="my-4 p-4 rounded-xl bg-emerald-950/80 border border-emerald-700/60 text-emerald-200 text-sm font-semibold flex items-center justify-center gap-2">
                            <span class="text-xl">📦</span>
                            <span id="impact-description">1 Paket Pangan Darurat & Air Bersih 10L</span>
                        </div>
                    </div>

                    <a href="#verified-orgs" class="inline-flex items-center justify-center gap-2 w-full py-3.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black text-sm transition shadow-lg">
                        <span>Salurkan Melalui Lembaga Resmi</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

            </div>
        </div>

        <!-- 2. Verified Organizations Grid -->
        <div id="verified-orgs" class="mb-16">
            <h3 class="text-xl font-extrabold text-slate-900 dark:text-white mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <span>Lembaga Kemanusiaan Terverifikasi & Resmi</span>
            </h3>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- MER-C Indonesia -->
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 rounded-full bg-red-100 dark:bg-red-950 text-red-700 dark:text-red-300 text-xs font-bold">
                                🏥 Rumah Sakit Indonesia Gaza
                            </span>
                            <span class="text-xs text-slate-400 font-medium">Terverifikasi RI</span>
                        </div>
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition">
                            MER-C Indonesia
                        </h4>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 mt-2 leading-relaxed">
                            Penyelenggara utama pembangunan dan pendampingan medis operasional Rumah Sakit Indonesia di Gaza serta obat-obatan darurat.
                        </p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
                        <span class="text-xs text-slate-400 font-medium">Fokus: Medis & Darurat</span>
                        <a href="https://mer-c.org" target="_blank" rel="noopener" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition">
                            Donasi MER-C
                        </a>
                    </div>
                </div>

                <!-- BAZNAS RI -->
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 rounded-full bg-emerald-100 dark:bg-emerald-950 text-emerald-800 dark:text-emerald-300 text-xs font-bold">
                                🇮🇩 BAZNAS RI Official
                            </span>
                            <span class="text-xs text-slate-400 font-medium">Lembaga Negara</span>
                        </div>
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition">
                            BAZNAS Membantu Palestina
                        </h4>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 mt-2 leading-relaxed">
                            Program penyaluran bantuan kemanusiaan resmi Pemerintah Indonesia berupa pangan, ambulans, dan tenda pengungsian.
                        </p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
                        <span class="text-xs text-slate-400 font-medium">Fokus: Logistik Pangan</span>
                        <a href="https://baznas.go.id" target="_blank" rel="noopener" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition">
                            Donasi BAZNAS
                        </a>
                    </div>
                </div>

                <!-- UNRWA / UN Emergency -->
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 rounded-full bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-300 text-xs font-bold">
                                🌐 UN Agency
                            </span>
                            <span class="text-xs text-slate-400 font-medium">PBB International</span>
                        </div>
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition">
                            UNRWA Palestine Relief
                        </h4>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 mt-2 leading-relaxed">
                            Badan bantuan PBB penanggung jawab pusat perlindungan pengungsi, sekolah darurat, dan fasilitas sanitasi warga Gaza.
                        </p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
                        <span class="text-xs text-slate-400 font-medium">Fokus: Pengungsian</span>
                        <a href="https://www.unrwa.org" target="_blank" rel="noopener" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition">
                            Official UNRWA
                        </a>
                    </div>
                </div>

                <!-- Palestine Red Crescent Society -->
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 rounded-full bg-rose-100 dark:bg-rose-950 text-rose-800 dark:text-rose-300 text-xs font-bold">
                                🚑 Bulan Sabit Merah
                            </span>
                            <span class="text-xs text-slate-400 font-medium">Tim Lapangan</span>
                        </div>
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition">
                            Palestine Red Crescent (PRCS)
                        </h4>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 mt-2 leading-relaxed">
                            Petugas medis garda depan penyelamatan korban luka, armada ambulans 24 jam, dan pos darurat di Gaza & Tepi Barat.
                        </p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
                        <span class="text-xs text-slate-400 font-medium">Fokus: Ambulans Lapangan</span>
                        <a href="https://www.palestinercs.org" target="_blank" rel="noopener" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition">
                            Kunjungi PRCS
                        </a>
                    </div>
                </div>

                <!-- UNICEF Gaza Children -->
                <div class="bg-white dark:bg-slate-900 rounded-3xl p-6 border border-slate-200 dark:border-slate-800 shadow-sm hover:shadow-xl transition duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-3 py-1 rounded-full bg-sky-100 dark:bg-sky-950 text-sky-800 dark:text-sky-300 text-xs font-bold">
                                👶 Perlindungan Anak
                            </span>
                            <span class="text-xs text-slate-400 font-medium">Hak Anak International</span>
                        </div>
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition">
                            UNICEF - Tanggap Darurat Gaza
                        </h4>
                        <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 mt-2 leading-relaxed">
                            Fokus pemenuhan air bersih, vitamin, imunisasi, dan pemulihan trauma psikososial bagi ratusan ribu anak di Gaza.
                        </p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
                        <span class="text-xs text-slate-400 font-medium">Fokus: Anak & Ibu</span>
                        <a href="https://www.unicef.org" target="_blank" rel="noopener" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold transition">
                            Bantuan UNICEF
                        </a>
                    </div>
                </div>

                <!-- Advocacy & Awareness Action Card -->
                <div class="bg-slate-900 text-white rounded-3xl p-6 border border-slate-800 shadow-xl flex flex-col justify-between">
                    <div>
                        <span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold">
                            📣 Suarakan Kebenaran
                        </span>
                        <h4 class="text-lg font-bold text-white mt-3">
                            Bagikan Pesan Solidaritas
                        </h4>
                        <p class="text-xs sm:text-sm text-slate-300 mt-2 leading-relaxed">
                            Salin teks kampanye kemanusiaan resmi untuk dibagikan ke WhatsApp, Instagram, dan media sosial Anda hari ini.
                        </p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-800">
                        <button onclick="copySolidarityText()" class="w-full py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-extrabold text-xs transition flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <span id="copy-btn-text">Salin Teks Solidaritas</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- Script for Aid Calculator & Copy Function -->
<script>
    function setAidImpact(amt, desc) {
        document.querySelectorAll('.aid-amt-btn').forEach(btn => {
            btn.classList.remove('bg-emerald-600', 'text-white', 'shadow-lg', 'active');
            btn.classList.add('bg-slate-800', 'text-slate-200');
        });
        event.target.classList.remove('bg-slate-800', 'text-slate-200');
        event.target.classList.add('bg-emerald-600', 'text-white', 'shadow-lg', 'active');

        const amtDisplay = document.getElementById('impact-amount');
        const descDisplay = document.getElementById('impact-description');

        if(amtDisplay) amtDisplay.innerText = 'Rp ' + amt.toLocaleString('id-ID');
        if(descDisplay) descDisplay.innerText = desc;
    }

    function copySolidarityText() {
        const text = "Mari bersama tingkatkan kepedulian dan bantuan kemanusiaan untuk masyarakat Gaza & Palestina. Dapatkan informasi mendalam dan akses bantuan resmi terverifikasi di Palestine Knowledge Hub: " + window.location.origin;
        navigator.clipboard.writeText(text).then(() => {
            const btnText = document.getElementById('copy-btn-text');
            if(btnText) {
                btnText.innerText = '✅ Teks Berhasil Disalin!';
                setTimeout(() => { btnText.innerText = 'Salin Teks Solidaritas'; }, 2500);
            }
        });
    }
</script>

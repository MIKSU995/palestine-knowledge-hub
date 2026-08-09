<section class="py-20 bg-gradient-to-br from-emerald-800 via-emerald-900 to-slate-950 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-emerald-400/20 via-transparent to-transparent pointer-events-none"></div>

    <div class="max-w-4xl mx-auto px-6 text-center relative z-10 space-y-6">
        <span class="px-4 py-1.5 rounded-full bg-white/20 text-white text-xs font-bold uppercase tracking-wider">
            Interactive Knowledge Test
        </span>

        <h2 class="text-3xl sm:text-5xl font-extrabold tracking-tight">
            Test Your Palestine History & Cultural Knowledge
        </h2>

        <p class="text-base sm:text-lg text-emerald-100 leading-relaxed max-w-2xl mx-auto">
            Take our interactive educational quizzes, earn digital achievement badges, and track your learning progress on your personal dashboard.
        </p>

        <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
            <a href="{{ route('quiz') }}" class="px-8 py-4 rounded-2xl bg-white text-emerald-900 font-extrabold text-base hover:bg-emerald-50 transition shadow-xl">
                Start Knowledge Quiz
            </a>
            <a href="{{ route('learning.dashboard') }}" class="px-8 py-4 rounded-2xl border-2 border-white/40 hover:bg-white/10 text-white font-bold text-base transition">
                View My Dashboard
            </a>
        </div>
    </div>
</section>
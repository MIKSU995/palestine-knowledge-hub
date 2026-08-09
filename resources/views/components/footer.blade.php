<footer class="bg-slate-900 text-slate-300 pt-16 pb-12 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-800">

            <!-- Col 1: Brand & Mission -->
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-600 to-red-600 flex items-center justify-center text-white font-black text-xl">
                        P
                    </div>
                    <h2 class="text-2xl font-bold text-white tracking-tight">
                        Palestine <span class="text-emerald-500">Hub</span>
                    </h2>
                </div>
                <p class="text-sm text-slate-400 leading-relaxed max-w-sm">
                    An open-access educational repository and real-time news platform dedicated to documenting history, culture, geography, and legal protections.
                </p>
                <div class="pt-2 flex items-center gap-3">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-semibold">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Real-Time Updates Active
                    </span>
                </div>
            </div>

            <!-- Col 2: Content Modules -->
            <div>
                <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Content Modules</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('articles') }}" class="hover:text-emerald-400 transition">Articles & Essays</a></li>
                    <li><a href="{{ route('timeline') }}" class="hover:text-emerald-400 transition">Historical Timeline</a></li>
                    <li><a href="{{ route('maps') }}" class="hover:text-emerald-400 transition">Geography & Interactive Maps</a></li>
                    <li><a href="{{ route('gallery') }}" class="hover:text-emerald-400 transition">Photo & Media Gallery</a></li>
                    <li><a href="{{ route('resources') }}" class="hover:text-emerald-400 transition">Educational Resources</a></li>
                </ul>
            </div>

            <!-- Col 3: Interactive Learning -->
            <div>
                <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Learning & News</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('news.index') }}" class="hover:text-emerald-400 transition">Real-Time News Hub</a></li>
                    <li><a href="{{ route('quiz') }}" class="hover:text-emerald-400 transition">Knowledge Quizzes</a></li>
                    <li><a href="{{ route('learning.dashboard') }}" class="hover:text-emerald-400 transition">Learning Progress</a></li>
                    <li><a href="{{ route('bookmarks') }}" class="hover:text-emerald-400 transition">Saved Bookmarks</a></li>
                    <li><a href="{{ route('sitemap') }}" class="hover:text-emerald-400 transition">XML Sitemap</a></li>
                </ul>
            </div>

            <!-- Col 4: Newsletter -->
            <div>
                <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Educational Newsletter</h3>
                <p class="text-xs text-slate-400 mb-3">Subscribe for weekly articles, new archival releases, and educational guides.</p>
                <form onsubmit="event.preventDefault(); alert('Thank you for subscribing to Palestine Knowledge Hub!');" class="space-y-2">
                    <input type="email" required placeholder="Enter your email..." class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800 border border-slate-700 text-sm text-white placeholder-slate-500 outline-none focus:border-emerald-500">
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm transition">
                        Subscribe
                    </button>
                </form>
            </div>

        </div>

        <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
            <p>© {{ date('Y') }} Palestine Knowledge Hub. Open educational portfolio project.</p>
            <div class="flex items-center gap-6">
                <span>Learn</span>
                <span>•</span>
                <span>Understand</span>
                <span>•</span>
                <span>Remember</span>
            </div>
        </div>
    </div>
</footer>
<nav class="sticky top-0 z-50 bg-white/90 dark:bg-slate-900/90 backdrop-blur-md border-b border-slate-200/80 dark:border-slate-800 transition-colors duration-200">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex items-center justify-between h-20">

            <!-- Brand Logo -->
            <a href="/" class="flex items-center gap-3 group">

                <div class="relative w-11 h-11 rounded-2xl bg-slate-950 dark:bg-slate-800 flex items-center justify-center text-white font-extrabold text-xl shadow-md group-hover:scale-105 transition-transform overflow-hidden border border-slate-700">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-600 via-slate-900 to-red-600 opacity-90"></div>
                    <span class="relative z-10 font-black tracking-tighter text-white">P</span>
                </div>

                <div>
                    <div class="flex items-center gap-1.5">
                        <h1 class="text-xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                            Palestine <span class="text-emerald-600 dark:text-emerald-400">Hub</span>
                        </h1>
                        <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-bold bg-red-100 text-red-700 dark:bg-red-950/60 dark:text-red-400 uppercase">
                            Edu
                        </span>
                    </div>

                    <p class="text-xs text-slate-500 dark:text-slate-400 font-medium">
                        Knowledge & Real-Time Platform
                    </p>
                </div>
            </a>

            <!-- Navigation Links (Desktop) -->
            <div class="hidden lg:flex items-center gap-6">

                <a href="/" class="text-sm font-semibold text-slate-700 dark:text-slate-200 hover:text-emerald-600 dark:hover:text-emerald-400 transition {{ request()->is('/') ? 'text-emerald-600 dark:text-emerald-400 font-bold' : '' }}">
                    Home
                </a>

                <a href="{{ route('news.index') }}" class="relative text-sm font-semibold text-slate-700 dark:text-slate-200 hover:text-emerald-600 dark:hover:text-emerald-400 transition flex items-center gap-1.5 {{ request()->routeIs('news.*') ? 'text-emerald-600 dark:text-emerald-400 font-bold' : '' }}">
                    <span>Real-Time News</span>
                    <span class="flex h-2 w-2 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                    </span>
                </a>

                <a href="{{ route('timeline') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200 hover:text-emerald-600 dark:hover:text-emerald-400 transition {{ request()->routeIs('timeline') ? 'text-emerald-600 dark:text-emerald-400 font-bold' : '' }}">
                    Timeline
                </a>

                <a href="{{ route('maps') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200 hover:text-emerald-600 dark:hover:text-emerald-400 transition {{ request()->routeIs('maps') ? 'text-emerald-600 dark:text-emerald-400 font-bold' : '' }}">
                    Maps
                </a>

                <a href="{{ route('articles') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200 hover:text-emerald-600 dark:hover:text-emerald-400 transition {{ request()->routeIs('articles*') ? 'text-emerald-600 dark:text-emerald-400 font-bold' : '' }}">
                    Articles
                </a>

                <a href="{{ route('gallery') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200 hover:text-emerald-600 dark:hover:text-emerald-400 transition {{ request()->routeIs('gallery') ? 'text-emerald-600 dark:text-emerald-400 font-bold' : '' }}">
                    Gallery
                </a>

                <a href="{{ route('resources') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200 hover:text-emerald-600 dark:hover:text-emerald-400 transition {{ request()->routeIs('resources') ? 'text-emerald-600 dark:text-emerald-400 font-bold' : '' }}">
                    Resources
                </a>

                <a href="{{ route('quiz') }}" class="text-sm font-semibold text-slate-700 dark:text-slate-200 hover:text-emerald-600 dark:hover:text-emerald-400 transition {{ request()->routeIs('quiz*') ? 'text-emerald-600 dark:text-emerald-400 font-bold' : '' }}">
                    Quiz
                </a>

            </div>

            <!-- Right Tools & User Actions -->
            <div class="flex items-center gap-3">

                <!-- Global Search Trigger -->
                <button onclick="openSearchModal()" class="p-2.5 rounded-xl text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-white bg-slate-100 dark:bg-slate-800 transition flex items-center gap-2 text-xs font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <span class="hidden sm:inline">Search</span>
                    <kbd class="hidden md:inline px-1.5 py-0.5 text-[10px] bg-slate-200 dark:bg-slate-700 rounded text-slate-600 dark:text-slate-300">Ctrl K</kbd>
                </button>

                <!-- Dark Mode Toggle -->
                <button onclick="toggleDarkMode()" aria-label="Toggle dark mode" class="p-2.5 rounded-xl text-slate-500 hover:text-amber-500 dark:text-slate-400 dark:hover:text-amber-400 bg-slate-100 dark:bg-slate-800 transition">
                    <svg class="w-4 h-4 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <svg class="w-4 h-4 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                </button>

                <!-- Saved Bookmarks Button -->
                <a href="{{ route('bookmarks') }}" class="p-2.5 rounded-xl text-slate-500 hover:text-emerald-600 dark:text-slate-400 dark:hover:text-emerald-400 bg-slate-100 dark:bg-slate-800 transition" title="Bookmarks">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                </a>

                <!-- User Dropdown / Auth Link -->
                @guest
                <a href="{{ route('login') }}" class="px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm transition shadow-sm hover:shadow">
                    Log in
                </a>
                @endguest

                @auth
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-2 p-1.5 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                        <div class="w-8 h-8 rounded-lg bg-emerald-600 text-white font-bold flex items-center justify-center text-sm">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <span class="hidden md:inline font-semibold text-sm text-slate-800 dark:text-slate-200">
                            {{ Auth::user()->name }}
                        </span>
                        <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>

                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-52 bg-white dark:bg-slate-900 rounded-2xl shadow-xl border border-slate-200 dark:border-slate-800 py-2 z-50" style="display: none;">
                        <a href="{{ route('learning.dashboard') }}" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">
                            Learning Dashboard
                        </a>
                        <a href="{{ route('bookmarks') }}" class="block px-4 py-2 text-sm text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-800">
                            Saved Bookmarks
                        </a>

                        @role('Admin')
                        <div class="border-t border-slate-100 dark:border-slate-800 my-1"></div>
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-amber-600 dark:text-amber-400 font-semibold hover:bg-amber-50 dark:hover:bg-amber-950/30">
                            Admin Control Panel
                        </a>
                        @endrole

                        <div class="border-t border-slate-100 dark:border-slate-800 my-1"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-950/30">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
                @endauth

                <!-- Mobile Menu Button -->
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="lg:hidden p-2.5 rounded-xl text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>

            </div>

        </div>

    </div>

    <!-- Mobile Drawer -->
    <div id="mobile-menu" class="hidden lg:hidden border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 px-6 py-4 space-y-3">
        <a href="/" class="block font-semibold text-slate-800 dark:text-slate-200 hover:text-emerald-600">Home</a>
        <a href="{{ route('news.index') }}" class="block font-semibold text-red-600 dark:text-red-400">Real-Time News Live</a>
        <a href="{{ route('timeline') }}" class="block font-semibold text-slate-800 dark:text-slate-200 hover:text-emerald-600">Timeline</a>
        <a href="{{ route('maps') }}" class="block font-semibold text-slate-800 dark:text-slate-200 hover:text-emerald-600">Maps</a>
        <a href="{{ route('articles') }}" class="block font-semibold text-slate-800 dark:text-slate-200 hover:text-emerald-600">Articles</a>
        <a href="{{ route('gallery') }}" class="block font-semibold text-slate-800 dark:text-slate-200 hover:text-emerald-600">Gallery</a>
        <a href="{{ route('resources') }}" class="block font-semibold text-slate-800 dark:text-slate-200 hover:text-emerald-600">Resources</a>
        <a href="{{ route('quiz') }}" class="block font-semibold text-slate-800 dark:text-slate-200 hover:text-emerald-600">Quiz</a>
        <a href="{{ route('bookmarks') }}" class="block font-semibold text-slate-800 dark:text-slate-200 hover:text-emerald-600">Bookmarks</a>
    </div>

</nav>
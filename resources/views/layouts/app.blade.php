<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Palestine Knowledge Hub - Learn, Understand, Remember')</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'Palestine Knowledge Hub is an authentic educational platform providing real-time news, historical timelines, geography maps, archives, quizzes, and open-access learning resources about Palestine.')">
    <meta name="keywords" content="Palestine, Palestine History, Jerusalem, Al-Aqsa, Gaza, Tatreez, Nakba 1948, Palestine Map, Educational Resources, Palestine News">

    <!-- Open Graph / Social Cards -->
    <meta property="og:title" content="@yield('title', 'Palestine Knowledge Hub')">
    <meta property="og:description" content="@yield('meta_description', 'Explore Palestine through trusted educational resources, real-time news, historical timelines, and interactive maps.')">
    <meta property="og:image" content="@yield('og_image', asset('https://images.unsplash.com/photo-1547981609-4b6bf67db7ff?w=1200'))">
    <meta property="og:type" content="website">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Leaflet CSS for Maps -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />

    <!-- Dark Mode Init Script (Prevents flash) -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);

        }
        .dark .glass-panel {
            background: rgba(17, 24, 39, 0.85);
            backdrop-filter: blur(12px);
        }
    </style>
    @stack('styles')
</head>

<body class="bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 min-h-screen flex flex-col transition-colors duration-200">

    <!-- Reading Progress Bar -->
    <div id="reading-progress" class="fixed top-0 left-0 h-1 bg-gradient-to-r from-emerald-500 via-emerald-600 to-red-600 z-[9999] transition-all duration-150" style="width: 0%"></div>

    <!-- Main Navigation Header -->
    @include('components.navbar')

    <!-- Flash Notifications -->
    @if(session('success'))
    <div class="max-w-7xl mx-auto px-6 mt-4">
        <div class="p-4 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-700 dark:text-emerald-300 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" class="text-slate-400 hover:text-slate-600">&times;</button>
        </div>
    </div>
    @endif

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Global Search Modal (Ctrl + K) -->
    <div id="global-search-modal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[999] hidden flex items-start justify-center pt-20 px-4">
        <div class="bg-white dark:bg-slate-900 rounded-3xl shadow-2xl max-w-2xl w-full border border-slate-200 dark:border-slate-800 overflow-hidden transform transition-all">
            <div class="p-4 border-b border-slate-100 dark:border-slate-800 flex items-center gap-3">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input type="text" id="global-search-input" placeholder="Search articles, timeline, news, quizzes, maps..." class="w-full bg-transparent outline-none text-slate-800 dark:text-slate-100 placeholder-slate-400 text-lg">
                <kbd class="px-2 py-1 bg-slate-100 dark:bg-slate-800 text-slate-500 rounded text-xs">ESC</kbd>
            </div>
            <div id="global-search-results" class="p-4 max-h-[60vh] overflow-y-auto space-y-3">
                <p class="text-sm text-slate-400 text-center py-6">Type something to search across the Palestine Knowledge Hub...</p>
            </div>
        </div>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

    <!-- Global Scripts -->
    <script>
        // Reading progress calculation
        window.addEventListener("scroll", function() {
            const winScroll = document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = height > 0 ? (winScroll / height) * 100 : 0;
            const el = document.getElementById("reading-progress");
            if (el) el.style.width = scrolled + "%";
        });

        // Dark Mode Toggle Logic
        function toggleDarkMode() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }

        // Global Search Modal Logic
        const searchModal = document.getElementById('global-search-modal');
        const searchInput = document.getElementById('global-search-input');
        const searchResults = document.getElementById('global-search-results');

        function openSearchModal() {
            if (searchModal) {
                searchModal.classList.remove('hidden');
                setTimeout(() => searchInput && searchInput.focus(), 100);
            }
        }

        function closeSearchModal() {
            if (searchModal) searchModal.classList.add('hidden');
        }

        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                openSearchModal();
            }
            if (e.key === 'Escape') {
                closeSearchModal();
            }
        });

        if (searchModal) {
            searchModal.addEventListener('click', function(e) {
                if (e.target === searchModal) closeSearchModal();
            });
        }

        let searchTimeout;
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                const query = this.value.trim();
                if (query.length < 2) {
                    searchResults.innerHTML = '<p class="text-sm text-slate-400 text-center py-6">Type at least 2 characters to search...</p>';
                    return;
                }

                searchTimeout = setTimeout(() => {
                    searchResults.innerHTML = '<p class="text-sm text-slate-400 text-center py-6">Searching knowledge base...</p>';
                    fetch(`/api/search?query=${encodeURIComponent(query)}`)
                        .then(res => res.json())
                        .then(data => {
                            let html = '';
                            const categories = ['articles', 'timeline', 'resources', 'news', 'quizzes'];
                            let totalFound = 0;

                            categories.forEach(cat => {
                                if (data[cat] && data[cat].length > 0) {
                                    totalFound += data[cat].length;
                                    html += `<div class="mb-3"><h4 class="text-xs font-semibold text-emerald-600 dark:text-emerald-400 uppercase tracking-wider mb-2">${cat}</h4><div class="space-y-1">`;
                                    data[cat].forEach(item => {
                                        html += `
                                            <a href="${item.url}" class="block p-3 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition flex items-center justify-between">
                                                <span class="font-medium text-slate-800 dark:text-slate-100">${item.title}</span>
                                                <span class="text-xs px-2 py-0.5 rounded bg-slate-200 dark:bg-slate-700 text-slate-600 dark:text-slate-300">${item.meta}</span>
                                            </a>
                                        `;
                                    });
                                    html += `</div></div>`;
                                }
                            });

                            if (totalFound === 0) {
                                html = '<p class="text-sm text-slate-400 text-center py-6">No matching content found for "' + query + '".</p>';
                            }

                            searchResults.innerHTML = html;
                        })
                        .catch(() => {
                            searchResults.innerHTML = '<p class="text-sm text-red-400 text-center py-6">Error loading search results.</p>';
                        });
                }, 300);
            });
        }

        // Bookmark & Like AJAX helper functions
        function toggleBookmark(id, type, btn) {
            fetch('/api/bookmark', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ id: id, type: type })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'guest') {
                    // Localstorage fallback for guests
                    let localBookmarks = JSON.parse(localStorage.getItem('p_bookmarks') || '[]');
                    const key = type + '_' + id;
                    if (localBookmarks.includes(key)) {
                        localBookmarks = localBookmarks.filter(k => k !== key);
                        btn.classList.remove('text-emerald-600', 'fill-current');
                        alert('Bookmark removed from local storage');
                    } else {
                        localBookmarks.push(key);
                        btn.classList.add('text-emerald-600', 'fill-current');
                        alert('Bookmarked in local storage');
                    }
                    localStorage.setItem('p_bookmarks', JSON.stringify(localBookmarks));
                } else {
                    if (data.bookmarked) {
                        btn.classList.add('text-emerald-600', 'fill-emerald-600');
                    } else {
                        btn.classList.remove('text-emerald-600', 'fill-emerald-600');
                    }
                    alert(data.message);
                }
            });
        }

        function toggleLike(id, type, countEl) {
            fetch('/api/like', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ id: id, type: type })
            })
            .then(res => res.json())
            .then(data => {
                if (countEl) countEl.innerText = data.total_likes;
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
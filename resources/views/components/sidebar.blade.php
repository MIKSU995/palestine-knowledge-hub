<aside class="w-60 min-h-screen bg-slate-900 text-white border-r border-slate-800">

    <div class="px-6 py-6 border-b border-slate-700">
        <h1 class="text-2xl font-bold text-green-400">
            Edukasi Palestina
        </h1>

        <p class="text-sm text-white-400 mt-1">
            Halaman Admin
        </p>
    </div>

    <nav class="flex-1 mt-6 space-y-2 px-4">

        <a href="{{ route('admin.dashboard') }}"
            class="block px-4 py-3 rounded-lg hover:bg-slate-800 transition">
            Dashboard
        </a>

        <a href="{{ route('admin.categories.index') }}"
            class="block px-4 py-3 rounded-lg hover:bg-slate-800 transition">
            Categories
        </a>

        <a href="#"
            class="block px-4 py-3 rounded-lg hover:bg-slate-800 transition">
            Timeline
        </a>

        <a href="#"
            class="block px-4 py-3 rounded-lg hover:bg-slate-800 transition">
            Gallery
        </a>

        <a href="#"
            class="block px-4 py-3 rounded-lg hover:bg-slate-800 transition">
            Quiz
        </a>

        <a href="#"
            class="block px-4 py-3 rounded-lg hover:bg-slate-800 transition">
            Users
        </a>

        <a href="{{ route('admin.articles.index') }}"
        class="block px-5 py-3 rounded-lg hover:bg-green-100">

        Articles

        </a>

    </nav>

</aside>
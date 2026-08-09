<header class="bg-white border-b shadow-sm">

    <div class="flex items-center justify-between px-8 py-4">

        <div>

            <h2 class="text-3xl font-bold text-green-500">
                @yield('title', 'Dashboard')
            </h2>

            <p class="text-sm text-black-500">
                Website Edukasi Palestina
            </p>

        </div>

        <div class="flex items-center gap-4">

            <span class="text-gray-700 font-medium">
                {{ Auth::user()->name }}
            </span>


            <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button
                    class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 transition">

                    Logout

                </button>

            </form>

        </div>

    </div>

</header>
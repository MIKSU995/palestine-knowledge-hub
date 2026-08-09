<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-green-700">
                    Palestine Knowledge Hub
                </h1>

                <p class="text-gray-600 mt-2">
                    Login untuk mengakses platform edukasi Palestina
                </p>
            </div>

            <x-auth-session-status
                class="mb-4"
                :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600 focus:outline-none">

                    @error('email')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <label class="block text-gray-700 font-semibold mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        required
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-600 focus:outline-none">

                    @error('password')
                        <p class="text-red-500 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Remember -->
                <div class="flex items-center justify-between mb-6">

                    <label class="flex items-center">
                        <input
                            type="checkbox"
                            name="remember"
                            class="mr-2">

                        <span class="text-gray-600">
                            Remember Me
                        </span>
                    </label>

                    @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-green-700 hover:underline">
                            Lupa Password?
                        </a>
                    @endif

                </div>

                <button
                    type="submit"
                    class="w-full bg-green-700 hover:bg-green-800 text-white py-3 rounded-lg font-semibold transition">

                    Login

                </button>

            </form>

            <div class="mt-8 text-center">

                <p class="text-gray-600">
                    Belum punya akun?
                    <a href="{{ route('register') }}"
                       class="text-red-600 font-semibold hover:underline">
                        Daftar
                    </a>
                </p>

            </div>

        </div>

    </div>
</x-guest-layout>
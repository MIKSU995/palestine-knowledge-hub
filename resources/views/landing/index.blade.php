@extends('layouts.app')

@section('title', 'Palestine Knowledge Hub')

@section('content')

<!-- ================= FEATURES ================= -->

<section id="features" class="py-24 bg-gray-50">

    <div class="max-w-7xl mx-auto px-6">

        <!-- Heading -->

        <div class="text-center max-w-3xl mx-auto">

            <span class="text-green-700 font-semibold uppercase tracking-wider">
                Learning Resources
            </span>

            <h2 class="mt-3 text-5xl font-extrabold text-gray-900">
                What Can You Explore?
            </h2>

            <p class="mt-6 text-lg text-gray-600 leading-8">
                Palestine Knowledge Hub provides interactive educational resources
                to help students, researchers and the public understand the history,
                geography and culture of Palestine through reliable information.
            </p>

        </div>

        <!-- Cards -->

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-20">

            <!-- Timeline -->

            <a href="#"
                class="group bg-white rounded-3xl border border-gray-200 p-8 shadow-sm hover:border-green-700 hover:shadow-xl hover:-translate-y-2 transition duration-300">

                <div class="flex justify-between items-center">

                    <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center text-3xl">
                        ⏳
                    </div>

                    <span class="bg-green-700 text-white text-xs px-3 py-1 rounded-full">
                        Popular
                    </span>

                </div>

                <h3 class="mt-6 text-2xl font-bold group-hover:text-green-700">
                    Historical Timeline
                </h3>

                <p class="mt-4 text-gray-600 leading-7">
                    Explore important events from ancient civilizations until the
                    present day with an interactive timeline.
                </p>

                <div class="mt-6 text-green-700 font-semibold">
                    Explore →
                </div>

            </a>

            <!-- Maps -->

            <a href="#"
                class="group bg-white rounded-3xl border border-gray-200 p-8 shadow-sm hover:border-green-700 hover:shadow-xl hover:-translate-y-2 transition duration-300">

                <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center text-3xl">
                    🗺️
                </div>

                <h3 class="mt-6 text-2xl font-bold group-hover:text-green-700">
                    Interactive Maps
                </h3>

                <p class="mt-4 text-gray-600 leading-7">
                    Compare Palestine across different historical periods through
                    interactive maps.
                </p>

                <div class="mt-6 text-green-700 font-semibold">
                    Explore →
                </div>

            </a>

            <!-- Articles -->

            <a href="#"
                class="group bg-white rounded-3xl border border-gray-200 p-8 shadow-sm hover:border-green-700 hover:shadow-xl hover:-translate-y-2 transition duration-300">

                <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center text-3xl">
                    📚
                </div>

                <h3 class="mt-6 text-2xl font-bold group-hover:text-green-700">
                    Articles
                </h3>

                <p class="mt-4 text-gray-600 leading-7">
                    Read trusted educational articles supported by reliable academic
                    references.
                </p>

                <div class="mt-6 text-green-700 font-semibold">
                    Explore →
                </div>

            </a>

            <!-- Gallery -->

            <a href="#"
                class="group bg-white rounded-3xl border border-gray-200 p-8 shadow-sm hover:border-green-700 hover:shadow-xl hover:-translate-y-2 transition duration-300">

                <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center text-3xl">
                    🖼️
                </div>

                <h3 class="mt-6 text-2xl font-bold group-hover:text-green-700">
                    Gallery
                </h3>

                <p class="mt-4 text-gray-600 leading-7">
                    Browse historical photographs, documents and educational
                    illustrations.
                </p>

                <div class="mt-6 text-green-700 font-semibold">
                    Explore →
                </div>

            </a>

            <!-- Quiz -->

            <a href="#"
                class="group bg-white rounded-3xl border border-gray-200 p-8 shadow-sm hover:border-green-700 hover:shadow-xl hover:-translate-y-2 transition duration-300">

                <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center text-3xl">
                    🎓
                </div>

                <h3 class="mt-6 text-2xl font-bold group-hover:text-green-700">
                    Quiz
                </h3>

                <p class="mt-4 text-gray-600 leading-7">
                    Test your knowledge through interactive quizzes and learning
                    challenges.
                </p>

                <div class="mt-6 text-green-700 font-semibold">
                    Explore →
                </div>

            </a>

            <!-- Bookmark -->

            <a href="#"
                class="group bg-white rounded-3xl border border-gray-200 p-8 shadow-sm hover:border-green-700 hover:shadow-xl hover:-translate-y-2 transition duration-300">

                <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center text-3xl">
                    ⭐
                </div>

                <h3 class="mt-6 text-2xl font-bold group-hover:text-green-700">
                    Bookmark
                </h3>

                <p class="mt-4 text-gray-600 leading-7">
                    Save your favourite articles and continue your learning journey
                    anytime.
                </p>

                <div class="mt-6 text-green-700 font-semibold">
                    Explore →
                </div>

            </a>

        </div>

    </div>

@endsection
</section>
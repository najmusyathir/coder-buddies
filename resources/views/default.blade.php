<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Halaman Utama') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex flex-col text-center space-y-8 px-12 py-24">

                <div class="flex flex-col items-center justify-center animate-bounce">
                    <img src="/images/logo-cropped.png" alt="Learn Image" class="w-64">
                    <h1 class="text-5xl font-bold text-blue-500">Selamat Datang Ke CoderBuddies!</h1>
                </div>

                <!-- Card Sections -->
                <div class="flex w-full items-center justify-center">
                    <div class="grid grid-cols-1 md:grid-cols-2 max-w-[600px] gap-6">
                        <a
                            class="bg-white overflow-hidden p-5 rounded-xl shadow-lg transform hover:scale-105 transition cursor-pointer">
                            <img src="/images/learn.jpg" alt="Learn Image" class="w-full object-cover">
                            <div class="py-5">
                                <h2 class="text-2xl font-bold text-blue-500 mb-2">Belajar Secara Interaktif</h2>
                                <p class="text-gray-600">Pembelajaran interaktif yang menginspirasi dan menyeronokkan.
                                </p>
                            </div>
                        </a>

                        <a
                            class="bg-white p-5 rounded-xl shadow-lg transform hover:scale-105 transition cursor-pointer">
                            <img src="/images/2.jpg" alt="Play Image" class="w-full object-cover">
                            <div class="py-5">
                                <h2 class="text-2xl font-bold text-blue-500 mb-2">Bermain Sambil Belajar</h2>
                                <p class="text-gray-600">Kuiz mencabar minda menggabungkan keseronokan dan kuasai
                                    kemahiran <span class="italic">Coding</span>!</p>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

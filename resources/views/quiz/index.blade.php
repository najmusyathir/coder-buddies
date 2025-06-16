<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl flex flex-col min-h-[75vh] mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center text-center space-y-8 px-12 py-8 bg-white rounded-xl gap-3">

                <h1 class="text-4xl font-bold text-blue-500">Uji Kemahiran Koding Sekarang!</h1>
                <p class="text-gray-700 max-w-[60ch] !m-0">Tingkatkan pengetahuan anda dengan menjawab kuiz
                    interaktif kami dan lihat sejauh mana kemahiran coding anda berkembang.</p>


                <!-- Card Sections -->
                <div class="flex justify-center !m-0">
                    <div class="grid grid-cols-1 gap-6 w-full items-center max-w-lg text-left">
                        <a href="{{ route('quiz.html') }}"
                            class="bg-white flex gap-5 p-5 items-center rounded-xl shadow-lg transform hover:scale-105 transition cursor-pointer">
                            <img src="/images/html.jpg" alt="Play Image" class="h-16 object-cover">
                            <div>
                                <h2 class="text-xl font-bold text-orange-500">Quiz Basis HTML</h2>
                                <p class="text-gray-600">Mula mengeksplorasi dunia<span class="italic">
                                        HTML</span>
                                    sekarang!</p>
                            </div>
                        </a>

                        <a href="{{ route('quiz.css') }}"
                            class="bg-white flex gap-5 p-5 items-center rounded-xl shadow-lg transform hover:scale-105 transition cursor-pointer">
                            <img src="/images/css.jpg" alt="Play Image" class="h-16 object-cover">
                            <div>
                                <h2 class="text-xl font-bold text-blue-500 mb-2">Quiz Basis CSS</h2>
                                <p class="text-gray-600">Mula mengeksplorasi dunia<span class="italic"> CSS</span>
                                    sekarang!</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

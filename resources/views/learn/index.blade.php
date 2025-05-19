<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex flex-col text-center space-y-8 px-12 py-24">

                <!-- Card Sections -->
                <div class="flex flex-col gap-12 w-full items-center justify-center bg-white rounded-xl p-12">
                    <div class="flex flex-col gap-3">
                        <h1 class="text-3xl font-bold text-blue-700">
                            Pilih Topik Pembelajaran Anda!
                        </h1>
                        <p class="text-lg max-w-lg">
                            Mulakan pembelajaran HTML atau CSS untuk cipta laman web yang hebat! Pilih topik di atas dan
                            mula belajar secara interaktif
                        </p>
                    </div>

                    <div class="grid grid-cols-2 max-w-md gap-6 justify-center">

                        <a href="{{ route('learn.html') }}">
                            <div class="relative group">
                                <img src="/images/html.jpg" alt="HTML Image"
                                    class="w-full object-cover rounded-xl shadow-lg">
                                <div
                                    class="absolute inset-0 bg-white flex flex-col items-center justify-center p-5 rounded-xl shadow-lg transform scale-95 opacity-0 group-hover:opacity-100 group-hover:scale-100 transition duration-300 cursor-pointer">
                                    <h2 class="text-2xl font-extrabold text-orange-500 mb-2">Mengenal Basis HTML</h2>
                                    <p class="text-gray-600">Mula mengeksplorasi dunia <span
                                            class="italic">Coding</span>
                                        sekarang!</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('learn.css') }}">
                            <div class="relative group">
                                <img src="/images/css.jpg" alt="CSS Image"
                                    class="w-full object-fit rounded-xl shadow-lg">
                                <div
                                    class="absolute inset-0 bg-white flex flex-col items-center justify-center p-5 rounded-xl shadow-lg transform scale-95 opacity-0 group-hover:opacity-100 group-hover:scale-100 transition duration-300 cursor-pointer">
                                    <h2 class="text-2xl font-extrabold text-blue-500 mb-2">Mengenal Basis CSS</h2>
                                    <p class="text-gray-600">Mula mengeksplorasi dunia <span
                                            class="italic">Coding</span>
                                        sekarang!</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

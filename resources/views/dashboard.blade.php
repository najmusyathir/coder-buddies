<x-app-layout>
    <div class="pt-12 flex flex-col gap-8 justify-center">

        <div class="flex justify-center">
            <div class="flex flex-col text-center space-y-8 px-12 py-24 bg-white max-w-6xl ">
                <div class="flex min-h-[500px] items-center justify-center">
                    <div class=" w-1/2 p-12 flex flex-col gap-6 text-left">
                        <h1 class="animate-fadeIn duration-300 text-5xl font-bold text-blue-500">Selamat Datang,
                            {{ Auth::user()->name }}!</h1>
                        <h2 class="animate-fadeIn duration-500 text-xl text-blue-500">Tahniah kerana telah berjaya log masuk!
                            Mari mulakan perjalanan
                            belajar HTML & CSS dengan lebih mendalam.</h2>
                        <a href="{{ route('learn.index') }}" class="btn-sec font-medium px-3 py-2 text-lg rounded">
                            Belajar Sekarang
                        </a>

                    </div>
                    <img src="/images/learn.jpg" alt="Learn Image"
                        class="w-1/2 object-cover duration-300 hover:scale-105 hover:shadow-xl hover:cursor-pointer hover:rounded-full">
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center text-center space-y-8 p-12 px-0 rounded-xl bg-white">
            <div class="flex flex-col max-w-6xl">
                <h1 class="text-5xl font-bold text-blue-500">Mula Terokai Pembelajaran!</h1>
                <div class="flex min-h-[500px] items-center justify-center">
                    <img src="/images/quiz.jpg" alt="Learn Image" class="w-1/2 object-cover">
                    <div class="w-1/2 p-12 flex flex-col gap-6 text-left">
                        <div class="flex flex-col max-w-[600px] gap-6">
                            <a href="{{ route('learn.index') }}"
                                class="bg-white overflow-hidden p-5 rounded-xl shadow-lg transform hover:scale-105 transition cursor-pointer">
                                <div class="py-5">
                                    <h1 class="text-3xl font-bold text-blue-500 mb-2">Nota</h1>
                                    <h2 class="text-xl font-bold text-blue-500 mb-2">Belajar Secara Interaktif
                                    </h2>
                                    <p class="text-gray-600">Pembelajaran interaktif yang menginspirasi dan
                                        menyeronokkan.
                                    </p>
                                </div>
                            </a>

                            <a href="{{ route('quiz.index') }}"
                                class="bg-white p-5 rounded-xl shadow-lg transform hover:scale-105 transition cursor-pointer">
                                <div class="py-5">
                                    <h1 class="text-3xl font-bold text-blue-500 mb-2">Quiz</h1>
                                    <h2 class="text-2xl font-bold text-blue-500 mb-2">Bermain Sambil Belajar
                                    </h2>
                                    <p class="text-gray-600">Kuiz mencabar minda menggabungkan keseronokan dan
                                        kuasai
                                        kemahiran <span class="italic">Coding</span>!</p>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>

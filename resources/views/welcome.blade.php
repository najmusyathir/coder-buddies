<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | KidZone</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-pink-200 to-blue-200 flex items-center justify-center min-h-screen">

    <div class="flex flex-col text-center space-y-8 px-12 py-24">

        <div class="flex flex-col items-center justify-center animate-bounce">
                <img src="/images/logo-cropped.png" alt="Learn Image" class="w-64">
            <h1 class="text-5xl font-bold text-blue-500">Selamat Datang Ke CoderBuddies!</h1>
        </div>

        <!-- Auth Links -->
        <div class="flex items-center justify-center gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}"
                        class="bg-green-500 text-white py-3 px-5 rounded-full hover:bg-green-600 transition">Home</a>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-green-500 text-white py-3 px-5 rounded-full hover:bg-green-600 transition">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="bg-orange-500 text-white py-3 px-5 rounded-full hover:bg-orange-600 transition">Register</a>
                    @endif
                @endauth
            @endif
        </div>

        <!-- Card Sections -->
        <div class="flex w-full items-center justify-center">
            <div class="grid grid-cols-1 md:grid-cols-2 max-w-[600px] gap-6">
                <a href="{{ route('learn.index') }}"
                class="bg-white overflow-hidden p-5 rounded-xl shadow-lg transform hover:scale-105 transition cursor-pointer">
                    <img src="/images/learn.jpg" alt="Learn Image" class="w-full object-cover">
                    <div class="py-5">
                        <h2 class="text-2xl font-bold text-blue-500 mb-2">Belajar Secara Interaktif</h2>
                        <p class="text-gray-600">Pembelajaran interaktif yang menginspirasi dan menyeronokkan.</p>
                    </div>
                </a>

                <a href="{{ route('quiz.index') }}"
                 class="bg-white p-5 rounded-xl shadow-lg transform hover:scale-105 transition cursor-pointer">
                    <img src="/images/2.jpg" alt="Play Image" class="w-full object-cover">
                    <div class="py-5">
                        <h2 class="text-2xl font-bold text-blue-500 mb-2">Bermain Sambil Belajar</h2>
                        <p class="text-gray-600">Kuiz mencabar minda menggabungkan keseronokan dan kuasai kemahiran <span class="italic">Coding</span>!</p>
                    </div>
                </a>
            </div>

        </div>
    </div>

</body>

</html>

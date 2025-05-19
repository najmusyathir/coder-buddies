<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | KidZone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Poetsen One", sans-serif;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen">
    <div class="fixed -z-10 top-0">
        <img src="/images/bg1.png" class="w-full min-h-screen object-cover">
    </div>

    <div class="flex flex-col text-center space-y-8 px-12 py-24">

        <!-- Auth Links -->
        {{-- <div class="flex items-center justify-center gap-4">
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
        </div> --}}

        <div class="py-5 bg-[#fff5]">
            <h1 class="text-5xl w-full text-center  font-bold text-blue-500 mb-2">Belajar HTML & CSS dengan Seronok!
            </h1>
            <h2 class="text-2xl font-bold text-blue-500 mb-2">
                Mari cipta laman web sendiri dari asas hingga hebat!
            </h2>
            <p class="text-gray-600">Pembelajaran interaktif yang menginspirasi dan menyeronokkan.</p>
        </div>

        <!-- Card Sections -->
        <div class="flex flex-col w-full items-center justify-center">
            <a href="{{ route('dashboard') }}"
                class="p-5 rounded-full overflow-hidden shadow-lg transform hover:scale-105 w-[400px] transition cursor-pointer flex items-center justify-center">
                <img src="/images/learn.jpg" alt="Learn Image" class="rounded-full">
            </a>



        </div>
    </div>

</body>

</html>

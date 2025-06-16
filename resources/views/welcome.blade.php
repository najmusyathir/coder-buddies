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

        p {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
        }
    </style>
</head>

<body class="flex flex-col items-center justify-center min-h-screen w-full bg-white">

    <div class="flex flex-col w-full items-center text-center gap-24 space-y-8 px-8 pt-36"
        style="background: url('images/bg1.png'); background-size: cover;">
        <div>
            <div class="py-5 bg-[#fff] w-screen">
                <h1 class="text-5xl w-full text-center  font-bold text-blue-500 mb-2">Belajar HTML & CSS dengan Seronok!
                </h1>
                <h2 class="text-2xl font-bold text-blue-500 mb-2">
                    Mari cipta laman web sendiri dari asas hingga hebat!
                </h2>
                <p class="text-gray-600 text-lg">Pembelajaran interaktif yang menginspirasi dan menyeronokkan.</p>
            </div>

            <!-- Card Sections -->
            <div class="flex flex-col w-full items-center justify-center gap-8 py-10">
                <a href="{{ route('dashboard') }}"
                    class="p-5 rounded-full overflow-hidden shadow-lg transform hover:scale-105 w-[400px] transition cursor-pointer flex items-center justify-center">
                    <img src="/images/landing.png" alt="Learn Image" class="rounded-full">
                </a>
                <a href="{{ route('dashboard') }}" class="bg-white rounded-lg hover:scale-105 duration-300">
                    <h3 class="text-2xl px-6 py-3 m-1 rounded-lg bg-white border-4 border-orange-500 text-blue-500">
                        Klik untuk mula <strong>sekarang</strong>
                    </h3>
                </a>

            </div>
        </div>

        <div class="w-screen flex justify-center">
            <img src="{{ asset('/images/wave.svg') }}" class="w-full h-40 object-cover" alt="">
        </div>
    </div>


    <div class="flex flex-col w-full bg-white">
        <div class="flex text-center items-center justify-center fade-in y-40 px-6 w-full">
            <div class="flex flex-col gap-8">
                <h2 id="animatedText" class="text-5xl font-thin text-orange-400"></h2>
                <script>
                    const texts = [
                        "Belajar Secara Interaktif",
                        "Fahami Dengan Mudah",
                        "Uji Kemahiran Koding"
                    ];

                    let index = 0;
                    let charIndex = 0;
                    let isDeleting = false;
                    const element = document.getElementById("animatedText");

                    function typeEffect() {
                        const currentText = texts[index];
                        if (isDeleting) {
                            charIndex--;
                            element.textContent = currentText.substring(0, charIndex);
                        } else {
                            charIndex++;
                            element.textContent = currentText.substring(0, charIndex);
                        }

                        if (!isDeleting && charIndex === currentText.length) {
                            setTimeout(() => isDeleting = true, 3000);
                        } else if (isDeleting && charIndex === 0) {
                            isDeleting = false;
                            index = (index + 1) % texts.length;
                        }

                        setTimeout(typeEffect, isDeleting ? 50 : 100);
                    }

                    typeEffect();
                </script>

                <p class="max-w-[60ch] text-xl " style="letter-spacing: 3px">
                    Website ini direka khas untuk kanak-kanak mempelajari asas HTML dan CSS dengan cara yang
                    menyeronokkan
                    dan interaktif. Pelajar boleh membaca penerangan ringkas, mencuba kod secara langsung, dan
                    menguji
                    kefahaman mereka melalui kuiz. Dengan pendekatan belajar sambil bermain, website ini membantu
                    membina
                    asas pengaturcaraan sejak usia muda.
                </p>
            </div>
            <img class="p-32 pt-0 rounded-full max-w-[600px]" src="{{ asset('/images/logo.png') }}" alt="">
        </div>
    </div>


    <div class="w-full" style="background: url('images/bg3.png')">
        <div class="w-full">
            <img src="{{ asset('/images/wave.svg') }}" class="w-full h-40 object-cover rotate-180" alt="">
        </div>
        <div class="w-full py-16">
            <div class="flex flex-col w-full items-center justify-center px-8 pb-16 fade-in">
                <div class="max-w-7xl w-full flex flex-col items-center text-center bg-white p-12 rounded-2xl">
                    <div class="flex flex-col gap-3 p-6 mb-6">
                        <h2 class="text-5xl font-thin text-center text-blue-500">Kanak-kanak Akan Seronok Belajar Koding</h2>
                        <h4 class="text-3xl text-center">Dengan Cara Menarik dan Mudah Difahami</h4>
                    </div>

                    <div class="w-full  grid grid-cols-1 lg:grid-cols-3 gap-8 px-12 text-center">
                        <div class="flex flex-col items-center gap-5 rounded-xl p-6">
                            <img src="/images/1.png" class="w-72 aspect-square rounded-full">
                            <h5 class="text-2xl text-blue-500">
                                Modul Lengkap Untuk Digunakan
                            </h5>
                            <p class="text-xl ">
                                Dengan bahan pengajaran yang lengkap dan panduan mesra pengguna, sesiapa sahaja boleh
                                mengajar
                                asas
                                pengaturcaraan dengan mudah dan yakin.
                            </p>
                        </div>

                        <div class="flex flex-col items-center gap-5 rounded-xl p-6">
                            <img src="/images/2.png" class="w-72 aspect-square rounded-full">

                            <h5 class="text-2xl text-blue-500">
                                Bahasa Kod Yang Diguna Profesional
                            </h5>
                            <p class="text-xl">
                                Pelajar akan menggunakan bahasa koding sebenar berasaskan teks, membina kemahiran
                                sebenar
                                seperti
                                pembangun perisian profesional.
                            </p>
                        </div>

                        <div class="flex flex-col items-center gap-5 rounded-xl p-6">
                            <img src="/images/3.png" class="w-72 aspect-square rounded-full">

                            <h5 class="text-2xl text-blue-500">
                                Menyeronokkan, Interaktif dan Efektif
                            </h5>
                            <p class="text-xl">
                                Kanak-kanak belajar secara aktif melalui permainan yang memberi ganjaran dan
                                meningkatkan
                                motivasi mereka
                                dalam memahami koding.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="w-full">
            <img src="{{ asset('/images/wave.svg') }}" class="w-full h-40 object-cover" alt="">
        </div>
    </div>



    <div class="bg-white w-full">
        <div class="flex flex-col w-full items-center justify-center bg-white px-8 py-16 pb-48 fade-in">
            <div class="max-w-5xl w-full flex flex-col gap-8 text-center">
                <h2 class="text-5xl font-thin text-blue-600">Statistik Buddies Coder</h2>
                <h4 class="text-3xl text-center">Platform kami menjadi kegemaran ramai</h4>

                <div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-8 text-center">

                    <div class="flex items-end justify-center gap-2 s-min py-16 counting"
                        data-target="{{ \App\Models\User::count() }}"
                        style="background: url('/images/blob1.svg'); background-size: cover; background-repeat: no-repeat;background-position: center;">
                        <h5 class="text-9xl text-blue-500">0</h5>
                        <p class="text-2xl text-wrap">Jumlah <br />Pengguna</p>
                    </div>

                    <div class="flex items-end justify-center gap-2 s-min py-16 counting" data-target="20"
                        style="background: url('/images/blob2.svg'); background-size: cover; background-repeat: no-repeat;background-position: center;">
                        <h5 class="text-9xl text-orange-400">0</h5>
                        <p class="text-2xl text-wrap">Nota<br />Kaki</p>
                    </div>

                    <div class="flex items-end justify-center gap-2 s-min py-16 counting"
                        data-target="{{ \App\Models\Result::count() }}"
                        style="background: url('/images/blob1.svg'); background-size: cover; background-repeat: no-repeat;background-position: center;">
                        <h5 class="text-9xl text-blue-400">0</h5>
                        <p class="text-2xl text-wrap">Kuiz <br />Dijawab</p>
                    </div>

                </div>

                <script>
                    function animateCounts() {
                        document.querySelectorAll('.counting').forEach(wrapper => {
                            const alreadyAnimated = wrapper.getAttribute('data-animated');
                            if (alreadyAnimated) return;

                            const target = parseInt(wrapper.getAttribute('data-target'), 10);
                            const numberEl = wrapper.querySelector('h5');
                            let start = 0;
                            const duration = 900;
                            const increment = target / (duration / 16);

                            const counter = setInterval(() => {
                                start += increment;
                                if (start >= target) {
                                    start = target;
                                    clearInterval(counter);
                                }
                                numberEl.textContent = Math.floor(start);
                            }, 16);

                            wrapper.setAttribute('data-animated', 'true');
                        });
                    }

                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                animateCounts();
                            }
                        });
                    }, {
                        threshold: 0.5
                    });

                    document.querySelectorAll('.counting').forEach(el => observer.observe(el));
                </script>
            </div>
        </div>
    </div>

    <footer class="bg-gray-800 text-white p-8 flex w-full">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <!-- Navigation Links -->
            <div class="flex flex-wrap gap-6 text-sm">
                <a href="{{ url('dashboard') }}" class="hover:text-blue-400">Halaman Utama</a>
                <a href="{{ route('learn.index') }}" class="hover:text-blue-400">Belajar</a>
                <a href="{{ route('quiz.index') }}" class="hover:text-blue-400">Quiz</a>
                <a href="{{ route('rank.index') }}" class="hover:text-blue-400">Carta</a>
            </div>

            <!-- Branding -->
            <div class="flex flex-col items-center">
                <img src="/images/logo-cropped.png" alt="CoderBuddies Logo" class="w-20">
                <p class="text-sm mt-2">&copy; 2025 CoderBuddies. Semua Hak Cipta Terpelihara.</p>
            </div>

            <!-- Copywriting -->
            <p class="text-center text-sm">
                "Belajar, Bermain, dan Berkembang bersama CoderBuddies."
            </p>
        </div>
    </footer>

    <script>
        const fadeEls = document.querySelectorAll('.fade-in');

        const fadeObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    fadeObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.3
        });

        fadeEls.forEach(el => {
            el.classList.add('opacity-0', 'translate-y-8', 'transition-all', 'duration-700');
            fadeObserver.observe(el);
        });
    </script>



</body>

</html>

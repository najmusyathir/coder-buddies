<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
            {{ __('Carta Markah') }}
        </h2>
    </x-slot>

    @php
        $sortedResult = $results->sortBy('duration')->sortByDesc('score')->values();
        $topOverallHTML = $sortedResult->filter(fn($result) => $result->type === 'html')->take(10);
        $topOverallCSS = $sortedResult->filter(fn($result) => $result->type === 'css')->take(10);

        $myResult = $sortedResult->where('user_id', auth()->id());
        $myTopHTMLResult = $myResult->where('type', 'html')->first();
        $myTopCSSResult = $myResult->where('type', 'css')->first();
        $myHTMLResults = $myResult->filter(fn($result) => $result->type === 'html')->take(10);
        $myCSSResults = $myResult->filter(fn($result) => $result->type === 'css')->take(10);

    @endphp

    <style scoped>
        /* For webkit browsers */
        .scrollbar-thin::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background: transparent;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 3px;
        }

        /* Firefox */
        .scrollbar-thin {
            scrollbar-width: thin;
            scrollbar-color: rgba(0, 0, 0, 0.3) transparent;
        }
    </style>

    <div class="py-12 bg-gradient-to-b from-blue-50 to-yellow-50 flex flex-col items-center">

        @if (!$myTopHTMLResult?->score)
            <p class="text-3xl font-extrabold text-indigo-600">Markah: Rekod Anda Tidak dijumpai</p>
        @endif

        <div class="px-6 flex justify-center w-full">

            {{-- own Record --}}
            @if ($myTopHTMLResult?->score)
                <div class="flex flex-col items-center space-y-8 py-12 px-8 w-1/2">

                    {{-- Best Record --}}
                    <div class="grid grid-cols-2 gap-6">
                        <div
                            class="flex flex-col gap-4 p-6 border border-indigo-300 rounded-xl bg-gradient-to-r from-indigo-100 to-indigo-200 shadow-lg">
                            <h1 class="text-2xl font-extrabold text-indigo-700 drop-shadow-md select-none">
                                🏆 Markah Tertinggi - HTML
                            </h1>
                            <div class="p-4 bg-white rounded-lg shadow-md">
                                <p class="text-3xl font-extrabold text-indigo-600">Score:
                                    {{ $myTopHTMLResult?->score * 10 || 0}}
                                    / 10</p>
                                <p class="text-lg text-indigo-500">⏱️
                                    {{ number_format($myTopHTMLResult?->duration / 1000, 2) || 0}}s</p>
                                <p class="text-sm text-indigo-400">
                                    {{ date('d M Y, H:i', strtotime($myTopHTMLResult?->created_at)) || 0 }}</p>
                            </div>
                        </div>

                        {{-- CSS Highlight --}}
                        <div
                            class="flex flex-col gap-4 p-6 border border-green-300 rounded-xl bg-gradient-to-r from-green-100 to-green-200 shadow-lg">
                            <h1 class="text-2xl font-extrabold text-green-700 drop-shadow-md select-none">
                                🏆 Markah Tertinggi - CSS
                            </h1>
                            <div class="p-4 bg-white rounded-lg shadow-md">
                                <p class="text-3xl font-extrabold text-green-600">Score:
                                    {{ $myTopCSSResult?->score * 10  || 0}} /
                                    10</p>
                                <p class="text-lg text-green-500">⏱️
                                    {{ number_format($myTopCSSResult?->duration / 1000, 2) || 0 }}s</p>
                                <p class="text-sm text-green-400">
                                    {{ date('d M Y, H:i', strtotime($myTopCSSResult?->created_at)) || 0}}</p>
                            </div>
                        </div>
                    </div>

                    {{-- HTML Old Record --}}
                    <div
                        class="flex flex-col gap-4 p-6 border border-blue-300 rounded-xl bg-gradient-to-r from-blue-100 to-blue-200 shadow-lg w-full">
                        <h1 class="text-3xl font-extrabold text-blue-500 drop-shadow-md select-none">
                            📜 Rekod Markah HTML Tertinggi
                        </h1>

                        <div class="flex flex-col gap-3 max-h-[200px] scrollbar-thin overflow-auto">
                            @foreach ($myHTMLResults as $result)
                                <div
                                    class="flex items-center justify-between bg-white p-3 rounded-lg shadow-md hover:bg-blue-100 transition">
                                    <div class="text-xl font-bold text-blue-600 pr-5">{{ $loop->iteration }}</div>
                                    <div class="flex-1 flex gap-8 items-center">
                                        <p class="text-2xl font-bold text-blue-600">{{ $result->score * 10 }} / 10</p>
                                        <p class="text-md text-blue-500">⏱️
                                            {{ number_format($result->duration / 1000, 2) }}s
                                        </p>
                                        <p class="text-sm text-blue-400">
                                            {{ date('d M Y, H:i', strtotime($result->created_at)) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    {{-- CSS Old Record --}}
                    <div
                        class="flex flex-col gap-4 p-6 border border-green-300 rounded-xl bg-gradient-to-r from-green-100 to-green-200 shadow-lg w-full">
                        <h1 class="text-3xl font-extrabold text-green-500 drop-shadow-md select-none">
                            📜 Rekod Markah CSS Tertinggi
                        </h1>
                        <div class="flex flex-col gap-3 max-h-[200px] scrollbar-thin overflow-auto">
                            @foreach ($myCSSResults as $result)
                                <div
                                    class="flex items-center justify-between bg-white p-3 rounded-lg shadow-md hover:bg-green-100 transition">
                                    <div class="text-xl font-bold text-green-600 pr-5">{{ $loop->iteration }}</div>
                                    <div class="flex-1 flex gap-8 items-center">
                                        <p class="text-2xl font-bold text-green-600">{{ $result->score * 10 }} / 10</p>
                                        <p class="text-md text-green-500">⏱️
                                            {{ number_format($result->duration / 1000, 2) }}s
                                        </p>
                                        <p class="text-sm text-green-400">
                                            {{ date('d M Y, H:i', strtotime($result->created_at)) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif


            {{-- global record --}}
            <div class="flex flex-col w-1/2 gap-5 p-6 rounded-2xl shadow-2xl">

                <div
                    class="flex flex-col p-8 gap-8 bg-gradient-to-r from-blue-300 via-green-300 to-yellow-300 rounded-xl ">

                    <h1 class="text-2xl font-extrabold text-indigo-700 drop-shadow-md select-none">
                        🏆 Rekod Keseluruhan - HTML
                    </h1>
                    <div class=" flex flex-col gap-3 max-h-[500px] scrollbar-thin overflow-auto">
                        @foreach ($topOverallHTML as $result)
                            <div
                                class="flex justify-between items-center bg-white rounded-xl shadow-md p-5 hover:shadow-xl transition-shadow duration-300 cursor-pointer select-none">
                                <div class="flex items-center gap-4">
                                    <div class="text-3xl font-extrabold text-indigo-700 w-10 text-center select-text">
                                        {{ $loop->iteration }}
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-extrabold text-indigo-800 tracking-wide">
                                            {{ $result->user->name ?? 'Unknown' }}
                                        </h3>
                                        <p class="text-sm text-indigo-600 italic tracking-tight">
                                            {{ date('d M Y, H:i', strtotime($result->created_at)) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="text-right min-w-[120px]">
                                    <p class="text-2xl font-bold text-green-700 tracking-wide">
                                        {{ number_format($result->score * 100, 1) }}%
                                    </p>
                                    <p class="text-sm text-green-800 tracking-tight">
                                        Masa: {{ number_format($result->duration / 1000, 2) }} saat
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div
                    class="flex flex-col p-8 gap-8 bg-gradient-to-r from-blue-300 via-green-300 to-yellow-300 rounded-xl ">

                    <h1 class="text-2xl font-extrabold text-indigo-700 drop-shadow-md select-none">
                        🏆 Rekod Keseluruhan - CSS
                    </h1>
                    <div class=" flex flex-col gap-3 max-h-[500px] scrollbar-thin overflow-auto">
                        @foreach ($topOverallCSS as $result)
                            <div
                                class="flex justify-between items-center bg-white rounded-xl shadow-md p-5 hover:shadow-xl transition-shadow duration-300 cursor-pointer select-none">
                                <div class="flex items-center gap-4">
                                    <div class="text-3xl font-extrabold text-indigo-700 w-10 text-center select-text">
                                        {{ $loop->iteration }}
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-extrabold text-indigo-800 tracking-wide">
                                            {{ $result->user->name ?? 'Unknown' }}
                                        </h3>
                                        <p class="text-sm text-indigo-600 italic tracking-tight">
                                            {{ date('d M Y, H:i', strtotime($result->created_at)) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="text-right min-w-[120px]">
                                    <p class="text-2xl font-bold text-green-700 tracking-wide">
                                        {{ number_format($result->score * 100, 1) }}%
                                    </p>
                                    <p class="text-sm text-green-800 tracking-tight">
                                        Masa: {{ number_format($result->duration / 1000, 2) }} saat
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

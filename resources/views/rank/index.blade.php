<x-app-layout>

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

    <div class="py-12 flex flex-col gap-16 items-center">

        <h2 class="bg-white bg-opacity-70 text-orange-600 font-bold text-4xl w-full py-12 text-center">
            Carta Markah
        </h2>

        <div class="p-6 flex flex-col justify-center bg-white rounded-2xl w-full max-w-[1140px]">

            {{-- own Record --}}

            <div class="flex flex-col items-center space-y-8 py-6 px-8 ">
                {{-- Best Record --}}
                <h2 class="text-2xl font-bold text-blue-600">
                    🏆 Rekod Peribadi 🏆
                </h2>

                <div class="grid grid-cols-2 gap-6">
                    <div class="flex gap-4 p-6 bg-slate-50 border rounded-xl shadow-lg">
                        <h1 class="text-2xl font-bold text-orange-600 drop-shadow-md select-none">
                            HTML
                        </h1>
                        <div class="p-4 flex flex-col flex-1 rounded-lg shadow-md">
                            @if ($myTopHTMLResult)
                                <div class="flex gap-6">
                                    <p class="text-3xl font-bold text-orange-600">Score:
                                        {{ $myTopHTMLResult->score * 10 }}
                                        / 10</p>
                                    <p class="text-lg text-orange-600">⏱️
                                        {{ number_format($myTopHTMLResult->duration / 1000, 2) }}s</p>
                                </div>

                                <p class="text-md text-end text-orange-600">
                                    {{ date('d M Y, H:i', strtotime($myTopHTMLResult->created_at)) }}</p>
                            @else
                                <p class="text-lg bg-white">Tiada Rekod.</p>
                            @endif
                        </div>
                    </div>

                    {{-- CSS Highlight --}}
                    <div class="flex gap-4 p-6 bg-slate-50 border rounded-xl shadow-lg">
                        <h1 class="text-xl font-bold text-blue-600 drop-shadow-md select-none">
                            CSS
                        </h1>
                        <div class="p-4 flex flex-col flex-1 rounded-lg shadow-md">
                            @if ($myTopCSSResult)
                                <div class="flex gap-6">
                                    <p class="text-3xl font-bold text-blue-600">Score:
                                        {{ $myTopCSSResult->score * 10 }} /
                                        10</p>
                                    <p class="text-lg text-blue-600">⏱️
                                        {{ number_format($myTopCSSResult->duration / 1000, 2) }}s</p>
                                </div>
                                <p class="text-sm text-blue-600 text-end">
                                    {{ date('d M Y, H:i', strtotime($myTopCSSResult?->created_at)) }}</p>
                            @else
                                <p class="text-xl">Tiada Rekod.</p>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- HTML Old Record --}}
                {{-- <div
                        class="flex flex-col gap-4 p-6 border bg-slate-200 rounded-xl shadow-lg w-full">
                        <h1 class="text-3xl font-bold text-orange-600 drop-shadow-md select-none">
                            📜 Rekod Markah HTML Tertinggi
                        </h1>

                        <div class="flex flex-col gap-3 max-h-[200px] scrollbar-thin overflow-auto">
                            @foreach ($myHTMLResults as $result)
                                <div
                                    class="flex items-center justify-between bg-white p-3 rounded-lg shadow-md hover:bg-orange-100 transition">
                                    <div class="text-xl font-bold text-orange-600 pr-5">{{ $loop->iteration }}</div>
                                    <div class="flex-1 flex gap-8 items-center">
                                        <p class="text-2xl font-bold text-orange-600">{{ $result->score * 10 }} / 10</p>
                                        <p class="text-md text-orange-600">⏱️
                                            {{ number_format($result->duration / 1000, 2) }}s
                                        </p>
                                        <p class="text-sm text-orange-600">
                                            {{ date('d M Y, H:i', strtotime($result->created_at)) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div> --}}

                {{-- CSS Old Record --}}
                {{-- <div
                        class="flex flex-col gap-4 p-6 border border-blue-300 rounded-xl shadow-lg w-full">
                        <h1 class="text-3xl font-bold text-blue-600 drop-shadow-md select-none">
                            📜 Rekod Markah CSS Tertinggi
                        </h1>
                        <div class="flex flex-col gap-3 max-h-[200px] scrollbar-thin overflow-auto">
                            @foreach ($myCSSResults as $result)
                                <div
                                    class="flex items-center justify-between bg-white p-3 rounded-lg shadow-md hover:bg-blue-100 transition">
                                    <div class="text-xl font-bold text-blue-600 pr-5">{{ $loop->iteration }}</div>
                                    <div class="flex-1 flex gap-8 items-center">
                                        <p class="text-2xl font-bold text-blue-600">{{ $result->score * 10 }} / 10</p>
                                        <p class="text-md text-green-500">⏱️
                                            {{ number_format($result->duration / 1000, 2) }}s
                                        </p>
                                        <p class="text-sm text-green-400">
                                            {{ date('d M Y, H:i', strtotime($result->created_at)) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> --}}
            </div>

            {{-- global record --}}
            <div class="flex flex-col bg-slate-50 rounded-xl shadow-xl p-16">
                <h2 class="text-2xl font-bold text-blue-600 text-center">
                    🏆 Rekod Keseluruhan 🏆
                </h2>
                <div class="flex gap-5">

                    <div class="flex flex-1 flex-col gap-8 bg-gradient-to-r rounded-xl ">

                        <h1 class="text-2xl font-bold text-indigo-700 drop-shadow-md text-center">
                            HTML
                        </h1>
                        <div class=" flex flex-col gap-3 max-h-[500px] scrollbar-thin overflow-auto">
                            @foreach ($topOverallHTML as $result)
                                <div
                                    class="flex justify-between items-center bg-white rounded-xl shadow-md p-5 hover:shadow-xl transition-shadow duration-300 cursor-pointer select-none">
                                    <div class="flex items-center gap-4">
                                        <div class="text-3xl font-bold text-indigo-700 w-10 text-center select-text">
                                            {{ $loop->iteration }}
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-indigo-800 tracking-wide">
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

                    <div class="flex flex-1 flex-col gap-8 bg-gradient-to-r rounded-xl ">

                        <h1 class="text-2xl font-bold text-indigo-700 drop-shadow-md text-center">
                            CSS
                        </h1>
                        <div class=" flex flex-col gap-3 max-h-[500px] scrollbar-thin overflow-auto">
                            @foreach ($topOverallCSS as $result)
                                <div
                                    class="flex justify-between items-center bg-white rounded-xl shadow-md p-5 hover:shadow-xl transition-shadow duration-300 cursor-pointer select-none">
                                    <div class="flex items-center gap-4">
                                        <div class="text-3xl font-bold text-indigo-700 w-10 text-center select-text">
                                            {{ $loop->iteration }}
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-indigo-800 tracking-wide">
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
    </div>
</x-app-layout>

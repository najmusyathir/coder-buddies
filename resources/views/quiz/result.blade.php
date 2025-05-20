<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col text-center space-y-8 px-6 md:px-12 py-16">
                <div class="max-w-6xl mx-auto space-y-8 bg-slate-50 p-12 rounded-xl">
                    @php
                        $userAnswers = json_decode($result->answers, true);
                    @endphp

                    <h2 class="text-3xl font-bold text-blue-700 text-center">Keputusan Kuiz</h2>
                    <div class="w-full flex justify-center">
                        <div
                            class="flex flex-col border-2 border-slate-200 gap-2 w-min rounded-xl text-nowrap py-6 px-12 shadow-xl text-left">
                            @if ($result->user_id != Auth::user()->id)
                                  <span class="text-xl text-blue-600 font-semibold">
                            Nama: {{ $result->user->name }}
                        </span>
                            @endif

                            <span class="text-xl text-blue-600 font-semibold">
                                Markah: {{ $result->score * 10 }} / 10
                            </span>
                            <span class="text-xl text-blue-600 font-semibold">
                                Jenis Kuiz:
                                @if ($result->type == 'html')
                                    <span class="text-orange-600">HTML</span>
                                @else
                                    <span>CSS</span>
                                @endif

                            </span>
                            <span class="text-xl text-blue-600 font-semibold">
                                Masa Diambil: {{ $result->duration / 1000 }} saat
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-left">
                        @foreach ($quiz as $index => $q)
                            <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200 space-y-4">
                                <div class="flex items-start gap-3">
                                    <div class="text-xl font-semibold text-gray-800">
                                        {{ $index + 1 }}.
                                    </div>
                                    <div class="text-lg font-medium text-gray-800">
                                        {{ $q['question'] }}
                                    </div>
                                </div>

                                <ul class="space-y-2">
                                    @foreach ($q['options'] as $option)
                                        @php
                                            $userAnswer = $userAnswers[$index] ?? null;
                                            $isCorrect = $option['id'] === $q['answer'];
                                            $isUserPick = $option['id'] === $userAnswer;

                                            if ($isCorrect && $isUserPick) {
                                                $bg = 'bg-green-100';
                                                $border = 'border-green-600';
                                            } elseif ($isCorrect) {
                                                $bg = 'bg-green-50';
                                                $border = 'border-green-300';
                                            } elseif ($isUserPick) {
                                                $bg = 'bg-red-100';
                                                $border = 'border-red-600';
                                            } else {
                                                $bg = 'bg-white';
                                                $border = 'border-gray-300';
                                            }
                                        @endphp

                                        <li class="px-4 py-2 rounded-lg border {{ $bg }} {{ $border }}">
                                            <span class="font-semibold">{{ $option['id'] }}.</span>
                                            <span>{{ $option['text'] }}</span>
                                        </li>
                                    @endforeach
                                </ul>

                                @if ($userAnswers[$index] !== $q['answer'])
                                    <div
                                        class="mt-2 bg-yellow-50 text-yellow-800 p-3 rounded-md text-sm border border-yellow-200">
                                        <strong>Penjelasan:</strong> {{ $q['explanation'] }}
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="flex w-full justify-center">
                        <a class="btn-pri text-xl px-6 py-2 rounded-xl" href="{{ route('rank.index') }}">Periksa Papan
                            Markah</a>
                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>

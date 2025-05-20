<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto bg-gray-100 p-10 rounded-lg shadow-lg">
            <h1 class="text-blue-600 font-bold text-3xl text-center pb-6">
                Kuiz CSS
            </h1>

            <form id="quizForm" method="POST" action="{{ route('quiz.submit') }}">
                @csrf

                @php
                    // Load the JSON data
                    $jsonFile = resource_path('data/quizHtml.json');
                    $quizData = json_decode(file_get_contents($jsonFile), true);
                    $optionLabels = range('A', 'Z');
                @endphp

                @foreach ($quizData as $index => $card)
                    <div class="p-5 bg-gray-100 rounded-lg shadow-md mb-5">
                        <h3 class="text-xl font-semibold mb-1 text-blue-600">
                            {{ $index + 1 }}. {{ $card['question'] }}
                        </h3>

                        <div class="space-y-2">
                            @foreach ($card['options'] as $optIndex => $option)
                                <div>
                                    <label class="inline-flex items-center space-x-2">
                                        <input type="radio" name="question_{{ $card['id'] }}"
                                            value="{{ $option['id'] }}" data-label="{{ $optionLabels[$optIndex] }}"
                                            data-text="{{ $option['text'] }}" required>
                                        <span>{{ $optionLabels[$optIndex] }}. {{ $option['text'] }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <input type="hidden" name="duration" id="durationInput">
                <input type="hidden" name="answers" id="answers">
                <input type="hidden" name="type" id="type" value="css">

                <button type="submit" class="bg-green-500 text-white px-5 py-2 rounded-lg hover:bg-green-600">
                    Hantar Jawapan
                </button>
            </form>
        </div>
    </div>

    <!-- Popup Modal -->
    <div id="popupModal" class="fixed flex inset-0 bg-gray-800 bg-opacity-75 items-center justify-center z-50 hidden">
        <div class="bg-white w-full max-w-lg p-5 rounded-lg shadow-lg flex flex-col gap-3 relative">
            <h3 class="text-2xl font-semibold mb-3">Jawapan Anda</h3>
            <ul id="answerList" class="space-y-2 text-gray-800"></ul>
            <button onclick="closePopup()" class="bg-green-600 text-white font-semibold px-3 py-1 rounded-lg">
                Periksa Jawapan
            </button>
        </div>
    </div>

    <script>
        // Store the starting time when the page loads in milliseconds
        const startTime = performance.now();

        // When the form is submitted, calculate the duration in milliseconds
        document.getElementById('quizForm').onsubmit = function(e) {
            e.preventDefault(); // Prevent form from submitting

            const endTime = performance.now();
            const duration = Math.floor(endTime - startTime);
            document.getElementById('durationInput').value = duration;

            // Gather all selected answers
            const answers = [];
            document.querySelectorAll('input[type="radio"]:checked').forEach(el => {
                answers.push(el.getAttribute('data-label'));
            });

            // Display answers in the modal
            const answerList = document.getElementById('answerList');
            answerList.innerHTML = '';

            answers.forEach((answer, index) => {
                const li = document.createElement('li');
                li.textContent = `Soalan ${index + 1}: ${answer}`;
                answerList.appendChild(li);
            });

            document.getElementById('answers').value = JSON.stringify(answers);


            // Show the modal
            document.getElementById('popupModal').classList.remove('hidden');
        };

        // Function to close the popup
        function closePopup() {
            document.getElementById('popupModal').classList.add('hidden');
            document.getElementById('quizForm').submit(); // Now submit the form
        }
    </script>
</x-app-layout>

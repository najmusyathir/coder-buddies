<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sesi 1: Mengenal Basis HTML') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto">
            <div x-data="{
                cards: {{ Js::from($learn) }},
                index: 0,
                selectCard(idx) {
                    this.isDisplayOpen = true;
                    this.index = idx;
                },
                openDsiplayl() {
                    this.isDisplayOpen = true;
                },
                closeDisplay() {
                    this.isDisplayOpen = false;
                },
                next() {
                    if (this.index < this.cards.length - 1) {
                        this.index++;
                    }
                },
                prev() {
                    if (this.index > 0) {
                        this.index--;
                    }
                },
                openModal() {
                    this.htmlCode = this.cards[this.index]?.html || '';
                    this.cssCode = this.cards[this.index]?.css || '';
                    this.isModalOpen = true;
                },
                closeModal() {
                    this.isModalOpen = false;
                    this.htmlCode = '';
                    this.cssCode = '';
                    const iframe = this.$refs.outputFrame;
                    if (iframe) {
                        const doc = iframe.contentDocument || iframe.contentWindow.document;
                        doc.open();
                        doc.write('');
                        doc.close();
                    }
                },
                runCode() {
                    const iframe = this.$refs.outputFrame;
                    const content = `
                        <html>
                            <head>
                                <style>${this.cssCode ?? ''}</style>
                            </head>
                            <body>
                                ${this.htmlCode ?? ''}
                            </body>
                        </html>
                    `;
                    const iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
                    iframeDocument.open();
                    iframeDocument.write(content);
                    iframeDocument.close();
                },
            }" class="space-y-5 bg-white p-10 rounded-lg shadow-lg">

                <!-- Cards Grid -->
                <div class="grid grid-cols-3 gap-5">
                    <template x-for="(card, idx) in cards" :key="idx">
                        <div @click="selectCard(idx)"
                            class="p-5 bg-gray-100 rounded-lg shadow-md hover:bg-gray-200 cursor-pointer">
                            <h3 class="text-xl font-semibold mb-1 text-blue-800"
                                x-text="`${idx + 1}. ${cards[idx].title}`"></h3>
                            <p class="text-gray-600" x-text="card.description"></p>
                        </div>
                    </template>
                </div>

                <!-- Display Content -->
                <template x-if="isDisplayOpen && cards[index]">
                    <div
                        class="w-full h-full fixed top-0 left-0 !m-0 bg-gray-900 bg-opacity-50 flex flex-col items-center justify-center p-12">
                        <div class="p-5 rounded-xl shadow-md bg-white w-full max-w-3xl">
                            <div class="flex justify-end">
                                <button @click="closeDisplay()"
                                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                    <svg id='x_20' width='20' height='20' viewBox='0 0 20 20'
                                        xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                                        <rect width='20' height='20' stroke='none' fill='#000000'
                                            opacity='0' />


                                        <g transform="matrix(0.83 0 0 0.83 10 10)">
                                            <g style="">
                                                <g transform="matrix(1 0 0 1 0 0)">
                                                    <path
                                                        style="stroke: none; stroke-width: 2; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;"
                                                        transform=" translate(-12, -12)"
                                                        d="M 0 0 L 24 0 L 24 24 L 0 24 z" stroke-linecap="round" />
                                                </g>
                                                <g transform="matrix(1 0 0 1 -0.1 -0.1)">
                                                    <line
                                                        style="stroke: #fff; stroke-width: 1.8072289156626506; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;"
                                                        x1="6" y1="-6" x2="-6" y2="6" />
                                                </g>
                                                <g transform="matrix(1 0 0 1 -0.1 -0.1)">
                                                    <line
                                                        style="stroke: #fff; stroke-width: 1.8072289156626506; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;"
                                                        x1="-6" y1="-6" x2="6" y2="6" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg></button>
                            </div>
                            <h2 class="text-2xl font-semibold mb-2 text-blue-800"
                                x-text="`${index + 1}. ${cards[index].title}`"></h2>
                            <p class="mb-2 text-gray-800" x-text="cards[index].description"></p>

                            <pre class="text-sm text-gray-900 my-3 py-2 px-3 bg-gray-100 border border-gray-200 rounded-md"><code class="text-wrap" x-text="cards[index].html"></code></pre>

                            <template x-for="(point, idx) in cards[index].points" :key="idx">
                                <p class="mt-2 text-sm text-gray-700">• <span x-text="point"></span></p>
                            </template>

                            <p class="mt-2 text-red-600">
                                Nota Penting: <span x-text="cards[index].note"></span>
                            </p>

                            <!-- Navigation Buttons -->
                            <div class="flex justify-between mt-5 bg-white">
                                <button @click="prev()" :disabled="index === 0"
                                    class="bg-blue-500 text-white px-5 py-2 rounded-lg hover:bg-blue-600 disabled:opacity-50">
                                    Sebelumnya
                                </button>

                                <button @click="openModal()"
                                    class="bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600">
                                    Cuba sendiri
                                </button>


                                <button @click="next()" :disabled="index === cards.length - 1"
                                    class="bg-green-500 text-white px-5 py-2 rounded-lg hover:bg-green-600 disabled:opacity-50">
                                    Seterusnya
                                </button>
                            </div>
                        </div>
                    </div>
                </template>


                <!-- Testing Popup -->
                <div x-show="isModalOpen"
                    class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
                    <div class="bg-white p-5 rounded-lg shadow-lg max-w-4xl w-full flex flex-col gap-3">

                        <div class="flex justify-end">
                            <button @click="closeModal()"
                                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                <svg id='x_20' width='20' height='20' viewBox='0 0 20 20'
                                    xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
                                    <rect width='20' height='20' stroke='none' fill='#000000' opacity='0' />


                                    <g transform="matrix(0.83 0 0 0.83 10 10)">
                                        <g style="">
                                            <g transform="matrix(1 0 0 1 0 0)">
                                                <path
                                                    style="stroke: none; stroke-width: 2; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;"
                                                    transform=" translate(-12, -12)" d="M 0 0 L 24 0 L 24 24 L 0 24 z"
                                                    stroke-linecap="round" />
                                            </g>
                                            <g transform="matrix(1 0 0 1 -0.1 -0.1)">
                                                <line
                                                    style="stroke: #fff; stroke-width: 1.8072289156626506; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;"
                                                    x1="6" y1="-6" x2="-6" y2="6" />
                                            </g>
                                            <g transform="matrix(1 0 0 1 -0.1 -0.1)">
                                                <line
                                                    style="stroke: #fff; stroke-width: 1.8072289156626506; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;"
                                                    x1="-6" y1="-6" x2="6" y2="6" />
                                            </g>
                                        </g>
                                    </g>
                                </svg></button>
                        </div>

                        <div class="flex">
                            <h2 class="text-2xl font-semibold">Praktis Sekarang</h2>

                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <textarea x-model="htmlCode" rows="5" class="p-2 border rounded-md" placeholder="HTML"></textarea>
                            <textarea x-model="cssCode" rows="5" class="p-2 border rounded-md" placeholder="CSS"></textarea>
                        </div>

                        <button @click="runCode()"
                            class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Jalankan
                        </button>

                        <iframe x-ref="outputFrame" class="w-full mt-5 border rounded-md h-64"></iframe>
                    </div>
                </div>

            </div>
        </div>

    </div>

</x-app-layout>

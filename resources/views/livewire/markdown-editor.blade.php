<div class="prose mx-auto md:px-4 px-2">
    <div class="md:w-full w-full">
        <p class="text-2xl font-bold text-gray-800 border-b border-gray-300">Create a new thread...</p>
        <p class="text-sm -mt-5">
            Make sure you've read our rules before proceeding.

            Please search for your question before posting your thread by using the search box in the navigation bar.
            Want to share large code snippets? Share them through our pastebin.
        </p>
        <form wire:submit.prevent="savePost" class="bg-white rounded-lg p-3">
            <div class="mb-4">
                <x-label class="font-semibold text-xl text-gray-900" for="subject" value="{{ __('Subject') }}" />
                <x-input wire:model="subject" id="subject" class="block mt-1 w-full bg-gray-100" type="text"
                    name="subject" autofocus />
            </div>
            <div>
                <x-label class="font-semibold text-xl text-gray-900" for="tags" value="{{ __('Tags') }}" />
                <x-input wire:model="tags" id="tags" class="block mt-1 w-full bg-gray-100" type="text"
                    name="tags" />
            </div>
            <div x-data="{
                count: 0,
                resize: function() {
                    $refs.textarea.style.height = '100px';
                    $refs.textarea.style.height = $refs.textarea.scrollHeight + 'px'
                }
            }">
                <div class="flex item-center gap-2 py-5">
                    @if ($previewMode == false)
                        <span class="inline-flex -space-x-px overflow-hidden rounded-md border shadow-sm">
                            <button
                                class="bg-sky-950 inline-block px-4 py-2 text-sm font-medium text-white hover:text-white hover:bg-sky-700 focus:relative active:bg-sky-950 active:text-white"
                                wire:click.prevent="toggleWrite; $dispatch('input')">
                                Write
                            </button>

                            <button
                                class="bg-white inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-slate-100 focus:relative"
                                wire:click.prevent="togglePreview; $dispatch('input')">
                                Preview
                            </button>
                        </span>
                    @else
                        <span class="inline-flex -space-x-px overflow-hidden rounded-md border shadow-sm">
                            <button
                                class="bg-white inline-block px-4 py-2 text-sm font-medium text-gray-700 hover:bg-slate-100 focus:relative"
                                wire:click.prevent="toggleWrite; $dispatch('input')">
                                Write
                            </button>
                            <button
                                class="bg-sky-950 inline-block px-4 py-2 text-sm font-medium text-white hover:text-white hover:bg-sky-700 focus:relative active:bg-sky-950 active:text-white"
                                wire:click.prevent="togglePreview; $dispatch('input')">
                                Preview
                            </button>

                        </span>
                    @endif

                </div>

                @if ($previewMode)
                    <div x-data x-init="let codeBlocks = $refs.markdown.querySelectorAll('pre code');
                    codeBlocks.forEach((codeBlock) => {
                        let copyButton = document.createElement('button');
                        let copyIcon = document.createElement('ion-icon');
                        copyIcon.setAttribute('name', 'copy-outline');
                        copyIcon.style.fontSize = '20px';
                        copyIcon.classList.add('hover:opacity-50', 'transition', 'duration-200');
                        copyButton.appendChild(copyIcon);
                        copyButton.classList.add('relative', 'float-right');
                        let popup = document.createElement('div');
                        popup.textContent = 'Copied to clipboard';
                        popup.classList.add('hidden', 'absolute', 'text-white', 'p-1', 'rounded', 'mt-2');
                        popup.style.top = '-15px';
                        popup.style.left = '-150px';
                        popup.style.transform = 'none';
                        popup.style.width = '50px'; // Adjust this value to your liking
                        copyButton.addEventListener('click', (event) => {
                            event.preventDefault();
                            event.stopPropagation();
                            navigator.clipboard.writeText(codeBlock.textContent);
                            popup.classList.remove('hidden');
                            setTimeout(() => { popup.classList.add('hidden'); }, 2000);
                        });
                        copyButton.appendChild(popup);
                        codeBlock.parentNode.insertBefore(copyButton, codeBlock);
                    });">
                        <div x-ref="markdown">{!! $parsedMarkdown !!}</div>
                    </div>
                @else
                    <textarea wire:model="markdown" x-ref="textarea" x-init="count = $refs.textarea.value.length;
                    resize()"
                        @input="count = $event.target.value.length; resize()"
                        class="text-base bg-gray-100 border -mt-5 border-gray-300 w-full max-h-full rounded-md focus:outline-none focus:ring-0 resize-none overflow-hidden"></textarea>

                    <div x-text="'Characters: ' + count" class="text-sm text-gray-500 mt-2"></div>
                @endif
            </div>
            <div class="flex item-end justify-end">
                <button
                    class="-mt-6 hover:shadow-form rounded-md hover:bg-sky-900 bg-sky-950 py-3 px-8 text-base font-semibold text-white outline-none"
                    type="submit">Create Thread</button>
            </div>
        </form>
    </div>
</div>


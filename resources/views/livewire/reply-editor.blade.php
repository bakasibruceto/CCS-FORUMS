<div>


    <div>
        Write a Reply
    </div>
    <div class="bg-white shadow rounded-lg mb-5 p-3 md:w-full">

        <div class="md:w-full w-full">
            <form wire:submit.prevent="savePost" class="bg-white rounded-lg p-3">

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
                        <div class="prose min-w-full">
                            <div x-data x-init="let codeBlocks = $refs.markdown.querySelectorAll('pre code');
                            codeBlocks.forEach((codeBlock) => {
                                let copyButton = document.createElement('button');
                                let copyIcon = document.createElement('ion-icon');
                                copyIcon.setAttribute('name', 'copy-outline');
                                copyIcon.style.fontSize = '20px';
                                copyIcon.classList.add('hover:opacity-50', 'transition', 'duration-200');
                                copyIcon.style.color = 'white';
                                copyButton.appendChild(copyIcon);
                                copyButton.classList.add('relative', 'float-right');
                                let popup = document.createElement('div');
                                popup.textContent = 'Copied to clipboard';
                                popup.classList.add('hidden', 'absolute', 'text-white', 'p-1', 'rounded', 'mt-2');
                                popup.style.top = '-15px';
                                popup.style.left = '-170px';
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
                                codeBlock.parentNode.style.position = 'relative';
                                copyButton.style.position = 'absolute';
                                copyButton.style.right = '10px';
                                copyButton.style.top = '10px';
                                codeBlock.parentNode.insertBefore(copyButton, codeBlock);
                            });">
                                <div x-ref="markdown">{!! $parsedMarkdown !!}</div>
                            </div>
                        </div>
                    @else
                        <textarea id='ye' wire:model="markdown" x-ref="textarea" x-init="count = $refs.textarea.value.length;
                        resize()"
                            @input="count = $event.target.value.length; resize()"
                            class="text-base bg-gray-100 border -mt-5 border-gray-300 w-full max-h-full rounded-md focus:outline-none focus:ring-0 resize-none overflow-hidden"></textarea>

                        <div x-text="'Characters: ' + count" class="text-sm text-gray-500 mt-2"></div>
                    @endif
                </div>
                <div class="flex item-end justify-end">
                    <button
                        class="-mt-6 hover:shadow-form rounded-md hover:bg-sky-900 bg-sky-950 py-3 px-8 text-base font-semibold text-white outline-none"
                        type="submit">Reply</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="prose container mx-auto md:px-4 px-2">
    <div class="md:w-full w-full">
            <p class="text-2xl font-bold text-gray-800 border-b border-gray-300">Create a new thread...</p>
            <form wire:submit.prevent="savePost" class="bg-white rounded-lg p-3">
                <div class="mb-4">
                    <x-label class="font-semibold text-xl text-gray-900" for="subject" value="{{ __('Subject') }}" />
                    <x-input wire:model="subject" id="subject" class="block mt-1 w-full bg-gray-100" type="text" name="subject" autofocus />
                </div>
                <div>
                    <x-label class="font-semibold text-xl text-gray-900" for="tags" value="{{ __('Tags') }}" />
                    <x-input wire:model="tags" id="tags" class="block mt-1 w-full bg-gray-100" type="text" name="tags" />
                </div>

                <div class="flex item-center gap-2 py-5">
                    <button class="hover:shadow-form rounded-md hover:bg-sky-900 bg-sky-950 py-3 px-8 text-base font-semibold text-white outline-none" wire:click.prevent="togglePreview">Write</button>
                    <button class="hover:shadow-form rounded-md hover:bg-sky-900 bg-sky-950 py-3 px-8 text-base font-semibold text-white outline-none" wire:click.prevent="togglePreview">Preview</button>
                </div>

                @if ($previewMode)
                    <div>{!! $parsedMarkdown !!}</div>
                @else
                    <textarea class="w-full resize-none rounded-md border border-gray-400 bg-gray-200 py-3 px-3 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" wire:model="markdown"></textarea>
                @endif
                <div class="flex item-end justify-end">
                    <button class="mt-2 hover:shadow-form rounded-md hover:bg-sky-900 bg-sky-950 py-3 px-8 text-base font-semibold text-white outline-none" type="submit">Create Thread</button>
                </div>    
            </form>
        </div>
    </div>  
</div>

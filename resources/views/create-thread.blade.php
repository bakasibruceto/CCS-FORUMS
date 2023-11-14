<x-app-layout>
    <p>Create a new thread
        Make sure you've read our rules before proceeding.

        Please search for your question before posting your thread by using the search box in the navigation bar.
        Want to share large code snippets? Share them through our pastebin.</p>
    <div>
        <x-label for="subject" value="{{ __('Subject') }}" />
        <x-input id="subject" class="block mt-1 w-full" type="text" name="subject" autofocus />
    </div>
    <div>
        <x-label for="subject" value="{{ __('Tags') }}" />
        <x-input id="subject" class="block mt-1 w-full" type="text" name="subject" autofocus />
    </div>







        <livewire:markdown-editor />







</x-app-layout>

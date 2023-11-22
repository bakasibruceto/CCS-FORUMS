<x-app-layout>
    <div class="flex flex-1 overflow-hidden">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 flex justify-between grid-cols-3 w-full">
            <x-sidebar />
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container py-8 mx-auto">
                @livewire('stats')
                </div>
            </main>
        </div>
    </div>
</x-app-layout>

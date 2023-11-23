<x-app-layout>
    <div class="flex flex-1 overflow-hidden">
        <div class="max-w-7xl flex justify-between grid-cols-3 w-full">
            <x-sidebar />

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container py-8 mx-auto">
                @livewire('stats')
                @livewire('user-logs')

                </div>
            </main>

        </div>
    </div>
</x-app-layout>

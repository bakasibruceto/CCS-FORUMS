<x-app-layout>
    <div class="flex flex-1 overflow-hidden justify-center transform scale-5">
        <div class="flex max-w-screen-2xl w-full mx-0">
            {{-- <x-sidebar /> --}}

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container py-8 mx-auto">
                    <h2 class="text-2xl font-semibold leading-tight md:ml-14 mb-3 pt-2">Manage</h2>
                    @livewire('counter.stats')
                    <h2 class="text-2xl font-semibold leading-tight md:ml-14 mb-3 pt-5">Logs</h2>
                    @livewire('tables.user-logs')
                </div>
            </main>
        </div>
    </div>
</x-app-layout>

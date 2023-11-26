<x-app-layout>
    <div class="flex flex-1 overflow-hidden">
        <div class="max-w-7xl flex justify-between grid-cols-3 w-full">
            <x-sidebar />
            <main class="flex-1 overflow-x-hidden overflow-y-auto">
                <div class="container py-8 mx-auto">
                    <div class="mt-2 md:ml-8">
                        @livewire('show-all-users')
                    </div>
                </div>
            </main>
        </div>
    </div>

</x-app-layout>

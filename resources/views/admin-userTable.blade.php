<x-app-layout>
    <div class="flex flex-1 overflow-hidden justify-center transform scale-5">
        <div class="flex max-w-screen-2xl w-full mx-0">
            <x-sidebar />
            <main class="flex-1 overflow-x-hidden overflow-y-auto">
                <div class="container py-8 mx-auto">
                    <div class="mt-2 md:ml-8">
                        @livewire('show-all-users')
                    </div>
                </div>
            </main>
        </div>
        <x-footer class />
    </div>

</x-app-layout>

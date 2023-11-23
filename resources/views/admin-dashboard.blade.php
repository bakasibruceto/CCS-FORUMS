<x-app-layout>
    <div class="flex flex-1 overflow-hidden">
        <div class="max-w-7xl flex justify-between grid-cols-3 w-full">
            <x-sidebar />
            
            <main class="w-full flex justify-center content-center">
                <div class="container py-8 mx-auto items-center">
                    @livewire('stats')
                </div>
            </main>
            
        </div>
    </div>
</x-app-layout>

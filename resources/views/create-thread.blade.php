<x-app-layout>
    <div class="flex flex-1 overflow-hidden -mt-4">
        <div class="flex flex-col flex-1">
            <div class="block md:grid md:grid-flow-row-dense md:grid-cols-3 md:grid-rows-3">
                <div class="col-span-2">
                    
                    <livewire:markdown-editor />

                    <div class="hidden md:block lg:block w-3/7 md:h-60 pt-11 mr-6">
                        
                        <p class="bg-white shadow rounded-lg mb-6 p-4 w-full text-xl mx-0"> 
                            Make sure you've read our rules before proceeding.

                            Please search for your question before posting your thread by using the search box in the navigation bar.
                            Want to share large code snippets? Share them through our pastebin.
                        </p>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

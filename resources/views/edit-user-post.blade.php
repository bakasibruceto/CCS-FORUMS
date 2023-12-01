<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 flex justify-center grid-cols-3 w-full ">
       <div class="w-full sm:w-3/4 md:w-1/2 lg:w-2/4">
        @livewire('thread.edit-thread',
        [
            'markdown' => $post->markdown,
            'subject' => $post->title,
            'tags' => $tags,
            'postId' => $post->id,

        ])
       </div>

   </div>


</x-app-layout>

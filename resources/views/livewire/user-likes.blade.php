<div wire:poll class="flex">
    @empty($liked)
        <button class="px-2 -mt-1 text-4xl font-bold hover:text-green-800"
            wire:click="like">♡</button>
    @else
        <button class="px-2 -mt-1  text-4xl font-bold text-red-700 hover:text-red-800"
            wire:click="like">♥</button>
    @endempty

    <p class="text mt-1 -ml-1">{{ $totalLikes }}</p>
</div>
{{-- <div wire:poll class="flex">
    @empty($liked)
        <button style="background: none; border: none;" wire:click="like">
            <img src="path_to_your_outline_thumb_image" alt="Outline Thumbs Up">
        </button>
    @else
        <button style="background: none; border: none;" wire:click="like">
            <img src="path_to_your_colored_thumb_image" alt="Colored Thumbs Up">
        </button>
    @endempty

    <p class="text-">{{ $totalLikes }}</p>
</div> --}}




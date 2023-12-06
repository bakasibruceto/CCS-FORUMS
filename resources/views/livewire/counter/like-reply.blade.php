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

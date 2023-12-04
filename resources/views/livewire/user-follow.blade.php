<div>
    @empty($following)
        <button class="px-10 py-2 text-md font-semibold border border-blue-700 text-white bg-blue-700 rounded-full hover:text-blue-700 hover:bg-blue-50" wire:click.prevent="follow">Follow</button>
    @else
        <button class="px-7 py-2 text-md font-semibold border border-blue-700 text-white bg-blue-700 rounded-full hover:text-blue-800 hover:bg-blue-50" wire:click.prevent="follow">Unfollow</button>
    @endempty
</div>
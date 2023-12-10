<div>
    @if($reply->solution)
        <span class="text-green-500 font-extrabold">Solved</span>
    @else
        <button wire:click="markAsSolution">Mark as Solution</button>
    @endif
</div>

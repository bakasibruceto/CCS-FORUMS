<div>
    <ul class="flex flex-col w-3/4 mx-auto mt-3 h-screen overflow-auto">
        @foreach ($users as $user)
            <li class="flex items-center justify-between px-4 py-2 border-b border-gray-200 cursor-pointer" wire:click='checkconversation({{ $user->id }})'>
                {{ $user->name }}
            </li>
        @endforeach
    </ul>
</div>

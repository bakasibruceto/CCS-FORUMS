<div>
    <table wire:poll class="border-collapse">
        <tr class="border-b border-black p-2 text-center">
            <td class="border-r border-black p-2">id</td>
            <td class="p-2">name</td>
            <td class="p-2">username</td>
            <td class="p-2">email</td>
            <td class="p-2">created_at</td>
        </tr>
        @foreach ($users as $user)
            <tr class="p-5 hover:bg-green-100">
                <td>{{ $user->id }}</td>
                @if ($editing === $user->id)
                    <td class="p-2">
                        <input type="text" wire:model.defer="name">
                    </td>
                    <td class="p-2">
                        <input type="text" wire:model.defer="username">
                    </td>
                    <td class="p-2">
                        <input type="text" wire:model.defer="email">
                    </td>
                    <td class="p-2">{{ $user->created_at->format('m-d-Y') }}</td>
                    <td class="text-red-500 p-2">
                        <button wire:click="save">Save</button>
                        <button wire:click="cancel">Cancel</button>

                    </td>
                @else
                    <td class="p-2">
                        {{ $user->name }}
                    </td>
                    <td class="p-2">{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="p-2">{{ $user->created_at->format('m-d-Y') }}</td>
                    <td class="text-green-500 p-2">
                        <button wire:click="edit({{ $user->id }})">Edit</button>
                    </td>
                @endif
                {{-- <td>
                    @if ($editing === $user->id)
                        <button wire:click="save">Save</button>
                    @else
                        <button wire:click="edit({{ $user->id }})">Edit</button>
                    @endif
                </td> --}}
            </tr>
        @endforeach
    </table>
</div>

<div>
    <div class="container mx-auto px-2 sm:px-8">
    <h2 class="text-2xl font-semibold leading-tight mb-3">Users</h2>
        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table wire:poll class="table-auto w-full">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 uppercase tracking-wider">
                            id
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 uppercase tracking-wider">
                            picture
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 uppercase tracking-wider">
                            name
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 uppercase tracking-wider">
                            username
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 uppercase tracking-wider">
                            email
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 uppercase tracking-wider">
                            created_at
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 uppercase tracking-wider">

                        </th>
                    </tr>
                </thead>

                @foreach ($users as $user)
                <tbody>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $user->id }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <img class="rounded-full mr-2 ml-1 w-10 h-10" src="{{ $user->profile_photo_url }}" alt="">
                        </td>

                        @if ($editing === $user->id)
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <input type="text" wire:model.defer="name">
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <input type="text" wire:model.defer="username">
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <input type="text" wire:model.defer="email">
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $user->created_at->format('m-d-Y') }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-red-500 text-sm">
                            <button wire:click="save">Save</button>
                            <button wire:click="cancel">Cancel</button>
                        </td>

                        @else
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $user->name }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $user->username }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $user->email }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            {{ $user->created_at->format('m-d-Y') }}
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-green-500 text-sm">
                            <button wire:click="edit({{ $user->id }})">Edit</button>
                        </td>

                        @endif
                        {{--<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
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
    </div>
    
</div>
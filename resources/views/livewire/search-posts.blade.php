<div>
    <select x-model="selected" class="px-4 py-2 bg-blue-500 text-white rounded">
        <option value="active">Show Active Posts</option>
        <option value="trashed">Show Trashed Posts</option>
    </select>

    <select x-model="tag" class="px-4 py-2 bg-blue-500 text-white rounded">
        <option value="">All Tags</option>
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>
    <input wire:model.debounce.500ms="searchTerm" type="text" placeholder="Search posts..." class="px-4 py-2 rounded">
    <div x-show="selected === 'active'">
        <table>
            <tr>
                <td class="w-20">Profile</td>
                <td class="w-20">username</td>
                <td class="w-40">Title</td>
                <td class="w-40">categories</td>
                <td class="w-20">status</td>
            </tr>
            @foreach ($forumPosts as $post)
                <x-admin-thread-list :post="$post" />
            @endforeach
        </table>
    </div>

    <div x-show="selected === 'trashed'">
        <table>
            <tr>
                <td class="w-20">Profile</td>
                <td class="w-20">username</td>
                <td class="w-40">Title</td>
                <td class="w-40">categories</td>
                <td class="w-20">status</td>
            </tr>
            @foreach ($trashedPosts as $trash)
                <x-admin-thread-list :post="$trash" />
            @endforeach
        </table>
    </div>
</div>

<x-app-layout>
    <div class="flex flex-1 overflow-hidden justify-center transform scale-5">
        <div class="flex max-w-screen-2xl w-full mx-0">
            <main class="flex-1 overflow-x-hidden overflow-y-auto">
                <div class="container py-8 mx-auto">
                    <div class="mt-2 md:ml-8" x-cloak x-data="{ selected: 'active' }">
                        <select x-model="selected" class="px-4 py-2 bg-blue-500 text-white rounded">
                            <option value="active">Active Posts</option>
                            <option value="trashed">Archived Posts</option>
                        </select>
                        <div x-show="selected === 'active'">
                            <table>
                                <tr>
                                    <td class="w-20">Profile</td>
                                    <td class="w-20">username</td>
                                    <td class="w-40">Title</td>
                                    <td class="w-40">categories</td>
                                    <td class="w-20">status</td>
                                    <td class="w-20">created_at</td>
                                </tr>
                                @foreach ($forumPost as $post)
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
                </div>
            </main>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="flex flex-1 overflow-hidden justify-center transform scale-5">
        <div class="flex max-w-screen-2xl w-full mx-0">
            <main class="flex-1 overflow-x-hidden overflow-y-auto">
                <div class="container py-8 mx-auto">

                    <div class="mt-2 md:ml-14" x-cloak x-data="{ selected: 'active' }">
                        <select x-model="selected" class="px-4 py-2 bg-sky-900 text-white rounded">
                            <option value="active">Active Posts</option>
                            <option value="trashed">Archived Posts</option>
                        </select>

                        <div class="inline-block shadow rounded-lg overflow-hidden mt-4">
                        <div x-show="selected === 'active'">
                            <table class="">
                                <tr>
                                    <td class="w-20 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 font-semibold uppercase tracking-wider">
                                        Profile
                                    </td>
                                    <td class="w-20 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 font-semibold uppercase tracking-wider">
                                        username
                                    </td>
                                    <td class="w-40 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 font-semibold uppercase tracking-wider">
                                        title
                                    </td>
                                    <td class="w-40 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 font-semibold uppercase tracking-wider">
                                        categories
                                    </td>
                                    <td class="w-20 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 font-semibold uppercase tracking-wider">
                                        status
                                    </td>
                                    <td class="w-20 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 font-semibold uppercase tracking-wider">
                                        created_at
                                    </td>
                                    <td class="w-20 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 uppercase tracking-wider">

                                    </td>
                                </tr>
                                @foreach ($forumPost as $post)
                                    <x-admin-thread-list :post="$post" />
                                @endforeach
                            </table>
                        </div>
                        <div x-show="selected === 'trashed'">
                            <table>
                                <tr>
                                    <td class="w-20 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 font-semibold uppercase tracking-wider">
                                        Profile
                                    </td>
                                    <td class="w-20 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 font-semibold uppercase tracking-wider">
                                        username
                                    </td>
                                    <td class="w-40 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 font-semibold uppercase tracking-wider">
                                        title
                                    </td>
                                    <td class="w-40 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 font-semibold uppercase tracking-wider">
                                        categories
                                    </td>
                                    <td class="w-20 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 font-semibold uppercase tracking-wider">
                                        status
                                    </td>
                                    <td class="w-20 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 font-semibold uppercase tracking-wider">
                                        created_at
                                    </td>
                                    <td class="w-20 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm text-gray-600 font-semibold uppercase tracking-wider">

                                    </td>
                                </tr>
                                @foreach ($trashedPosts as $trash)
                                    <x-admin-thread-list :post="$trash" />
                                @endforeach
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>

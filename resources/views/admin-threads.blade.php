<x-app-layout>
    <div class="flex flex-1 overflow-hidden justify-center transform scale-5">
        <div class="flex max-w-screen-2xl w-full mx-0">
            {{-- <x-sidebar /> --}}
            <main class="flex-1 overflow-x-hidden overflow-y-auto">
                <div class="container py-8 mx-auto">
                    <div class="mt-2 md:ml-8">
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
                        <div class="mb-10">
                            {{-- Pagination --}}
                            {{ $forumPosts->links() }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>

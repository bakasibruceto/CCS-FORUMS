<div wire:poll.keep-alive.5000ms>
    @foreach ($replies as $reply)
        <div id="reply-{{ $reply->id }}" class="bg-white shadow rounded-lg mb-5 p-3 md:w-full">
            <div class="flex items-center mb-3 gap-1 justify-between">
                <div class="flex items-center gap-1">
                    <img class="rounded-full mr-2 ml-1 w-10 h-10" src="{{ $reply->user->profile_photo_url }}"
                        alt="">
                    <strong class="mr-2">{{ $reply->user->username }}</strong> posted
                    {{ $reply->created_at->diffForHumans() }}
                </div>
                <div class="flex">
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="h-6 w-6 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <div class="py-1" role="menu" aria-orientation="vertical"
                                aria-labelledby="options-menu">
                                @if ($reply->user_id == auth()->id())
                                    @if (!isset($editing[$reply->id]) || !$editing[$reply->id])
                                        <div wire:click='toggleEdit({{ $reply->id }})'
                                            class="px-4 py-2 text-sm hover:bg-gray-100 flex items-center"
                                            role="menuitem">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                            </svg>
                                            <p class="pl-3">edit</p>
                                        </div>
                                    @endif
                                    <a href="#"
                                        class="px-4 py-2 text-sm text-red-500 hover:bg-gray-100 hover:text-red-700 flex items-center"
                                        role="menuitem">
                                        <svg class="-ml-1" width="24" height="24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M17 6V5C17 3.89543 16.1046 3 15 3H9C7.89543 3 7 3.89543 7 5V6H4C3.44772 6 3 6.44772 3 7C3 7.55228 3.44772 8 4 8H5V19C5 20.6569 6.34315 22 8 22H16C17.6569 22 19 20.6569 19 19V8H20C20.5523 8 21 7.55228 21 7C21 6.44772 20.5523 6 20 6H17ZM15 5H9V6H15V5ZM17 8H7V19C7 19.5523 7.44772 20 8 20H16C16.5523 20 17 19.5523 17 19V8Z"
                                                fill="currentColor" />
                                        </svg>
                                        <p class="pl-3">delete</p>
                                    </a>
                                @else
                                    <a href="#">Mark as spam</a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="border-t border-gray-200"></div>
            <div class="p-3 flex-grow w-full">
                @if (!isset($editing[$reply->id]) || !$editing[$reply->id])
                    @livewire('markdown-parser', ['markdown' => $reply->markdown], key($reply->id))
                @else
                    @livewire('comment.edit-comment', ['replyId' => $reply->id])
                    <button wire:click='toggleEdit({{ $reply->id }})'>cancel</button>
                @endif
            </div>
            <div class="flex justify-between pr-5 pl-3" wire:ignore>
                @livewire('counter.like-reply',['reply_id' => $reply->id])
                @livewire('counter.mark-solution', ['postId' => $reply->post_id, 'replyId' => $reply->id])
            </div>
        </div>
    @endforeach
</div>

<div>
    <div class="flex justify-between items-center p-4 bg-gray-200">
        <div class="font-bold text-xl">
            Chat
        </div>
        <div class="w-10 h-10">
            <img class="w-full h-full rounded-full" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ auth()->user()->name }}" alt="">
        </div>
    </div>

    <div class="p-4">
        @if (count($conversations) > 0)
            @foreach ($conversations as $conversation)
                <div class="flex items-center space-x-4 cursor-pointer" wire:key='{{ $conversation->id }}'
                    wire:click="$emit('chatUserSelected', {{ $conversation }},{{ $this->getChatUserInstance($conversation, $name = 'id') }})">
                    <div class="w-10 h-10">
                        <img class="w-full h-full rounded-full" src="https://ui-avatars.com/api/?name={{ $this->getChatUserInstance($conversation, $name = 'name') }}" alt="">
                    </div>

                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div class="font-bold">{{ $this->getChatUserInstance($conversation, $name = 'name') }}</div>
                            <span class="text-sm text-gray-500">
                                {{ $conversation->messages->last()?->created_at->shortAbsoluteDiffForHumans() }}</span>
                        </div>

                        <div class="flex justify-between items-center mt-2">
                            <div class="truncate">
                                {{ $conversation->messages->last()->body }}
                            </div>

                            @php
                                if (count($conversation->messages->where('read', 0)->where('receiver_id', Auth()->user()->id))) {
                                    echo ' <div class="text-xs text-white bg-red-500 rounded-full px-2">  ' . count($conversation->messages->where('read', 0)->where('receiver_id', Auth()->user()->id)) . '</div> ';
                                }

                            @endphp

                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center text-gray-500 mt-5">
                you have no conversations
            </div>
        @endif

    </div>
</div>

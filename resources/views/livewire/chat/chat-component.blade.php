<div class="p-6" wire:poll>
    <div x-data="{ }"
         x-init="
            $refs.chatMessages.scrollTop = $refs.chatMessages.scrollHeight;
            Livewire.on('messageSent', () => { setTimeout(() => { $refs.chatMessages.scrollTop = $refs.chatMessages.scrollHeight }, 100) });
            Livewire.on('messageReceived', () => { setTimeout(() => { $refs.chatMessages.scrollTop = $refs.chatMessages.scrollHeight }, 100) });
         ">
        <div id="chat-messages" x-ref="chatMessages" class="overflow-y-auto h-64 mb-4">
            @foreach($messages as $message)
                <div class="{{ $message->sender_id == auth()->id() ? 'text-right' : '' }}">
                    <div class="{{ $message->sender_id == auth()->id() ? 'bg-blue-500 text-white' : 'bg-gray-300 text-black' }} inline-block rounded-lg px-4 py-2 mb-4">
                        {{ $message->message }}
                    </div>
                </div>
            @endforeach
        </div>

        <form wire:submit.prevent="sendMessage" class="flex" x-on:submit="setTimeout(() => { $refs.chatMessages.scrollTop = $refs.chatMessages.scrollHeight }, 100)">
            <input type="text" wire:model="message" class="w-full rounded-l-lg p-4 outline-none" placeholder="Type a message...">
            <button type="submit" class="bg-blue-500 text-white rounded-r-lg px-4">Send</button>
        </form>
    </div>
</div>

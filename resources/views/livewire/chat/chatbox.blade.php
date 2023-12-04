<div>
    @if ($selectedConversation)
        <div class="flex items-center p-4">

            <div class="mr-4 cursor-pointer">
                <i class="bi bi-arrow-left"></i>
            </div>

            <div class="w-10 h-10 mr-4">
                <img class="w-full h-full rounded-full" src="https://ui-avatars.com/api/?name={{ $receiverInstance->name }}" alt="">
            </div>

            <div class="mr-4">
                <p class="font-bold">{{ $receiverInstance->name }}</p>
            </div>

            <div class="flex space-x-4">

                <div>
                    <i class="bi bi-telephone-fill"></i>
                </div>

                <div>
                    <i class="bi bi-image"></i>
                </div>

                <div>
                    <i class="bi bi-info-circle-fill"></i>
                </div>
            </div>
        </div>

        <div class="p-4 space-y-4">
            @foreach ($messages as $message)
                <div class="w-3/4 max-w-3/4 max-w-max-content {{ auth()->id() == $message->sender_id ? 'bg-blue-500 text-white' : 'bg-gray-200 text-black' }}">

                    <p>{{ $message->body }}</p>
                    <div class="flex justify-between items-center mt-2">
                        <div>
                            <p class="text-sm">{{ $message->created_at->format('m: i a') }}</p>
                        </div>

                        <div>
                            @php
                                if ($message->user->id === auth()->id()) {
                                    if ($message->read == 0) {
                                        echo '<i class="bi bi-check2"></i> ';
                                    } else {
                                        echo '<i class="bi bi-check2-all text-primary"></i> ';
                                    }
                                }
                            @endphp
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center text-primary mt-5 text-lg">
            no conversation selected
        </div>
    @endif
</div>

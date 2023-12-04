<?php

namespace App\Livewire\Chat;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Events\NewMessage;

class ChatComponent extends Component
{
    public $message;
    public $messages = [];
    public $receiver_id;

    public $lastMessageId;

    // protected $listeners = ['echo-private:chat.{receiver_id},NewMessage' => 'messageReceived'];

    public function sendMessage()
    {
        $newMessage = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $this->receiver_id,
            'message' => $this->message,
        ]);

        $this->message = '';

        $this->dispatch('messageSent');

        // event(new NewMessage($newMessage));
    }

    public function messageReceived($event)
    {
        dd($event);
        $this->messages = $this->fetchMessages();
    }

    public function fetchMessages()
    {
        return Message::where(function ($query) {
            $query->where('sender_id', Auth::id())
                ->where('receiver_id', $this->receiver_id);
                $this->dispatch('messageReceived');
        })->orWhere(function ($query) {
            $query->where('sender_id', $this->receiver_id)
                ->where('receiver_id', Auth::id());
                $this->dispatch('messageReceived');
        })->get();

    }

    public function mount($receiver_id)
    {
        $this->receiver_id = $receiver_id;
        $this->lastMessageId = Message::latest()->first()->id;
    }

    public function render()
    {
        $this->messages = $this->fetchMessages();

        return view('livewire.chat.chat-component');
    }

    public function updatedMessage()
    {
        $this->dispatch('messageUpdated');
    }

    public function getListeners()
    {
        $auth_id = auth()->user()->id;
        return [
            "echo-private:chat.{$auth_id},NewMessage" => 'newMessage',
        ];
    }

    public function newMessage($payload)
    {
        $this->lastMessageId = $payload['message']['id'];
    }
}

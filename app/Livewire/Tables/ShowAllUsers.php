<?php

namespace App\Livewire\Tables;

use App\Models\User;
use Livewire\Component;

class ShowAllUsers extends Component
{
    public $users;
    public $editing;
    public $name;
    public $username;
    public $email;

    public function mount()
    {
        $this->users = User::where('role', 'user')->get();
    }

    public function edit($userId)
    {
        $this->editing = $userId;
        $this->name = User::find($userId)->name;
        $this->username = User::find($userId)->username;
        $this->email = User::find($userId)->email;
    }

    public function cancel()
    {
        $this->editing = null;
    }

    public function save()
    {
        $user = User::find($this->editing);
        $user->name = $this->name;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->save();

        // Refresh the users collection to reflect the changes
        $this->users = User::where('role', 'user')->get();

        $this->editing = null;
    }

    public function render()
    {
        return view('livewire.show-all-users', ['users' => $this->users]);
    }
}

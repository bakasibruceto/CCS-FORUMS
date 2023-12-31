<?php

namespace App\Livewire\Tables;

use Livewire\Component;
use App\Models\Log;
class UserLogs extends Component
{

    public $logs;

    public function render()
    {
        $this->logs = $this->getLogs();
        return view('livewire.tables.user-logs');
    }

    public function getLogs()
    {
        // Fetch the logs from the logs table and order them by the created_at column in descending order
        $logs = Log::orderBy('created_at', 'desc')->get();

        return $logs;
    }
}

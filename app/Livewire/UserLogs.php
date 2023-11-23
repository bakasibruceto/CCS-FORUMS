<?php

namespace App\Livewire;

use Livewire\Component;

class UserLogs extends Component
{
    public function render()
    {
        $logs = $this->getLogs();
        return view('livewire.user-logs', ['logs' => $logs]);
    }
    public function getLogs()
{
    $logFile = storage_path('logs/laravel.log'); // adjust this to your log file path

    if (file_exists($logFile)) {
        $logs = file($logFile);
        return array_reverse($logs); // reverse so that the latest logs are first
    }

    return [];
}
}

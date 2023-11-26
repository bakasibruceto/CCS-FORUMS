<?php

namespace App\Livewire;

use Livewire\Component;

class MarkdownSave extends Component
{
    use \MarkdownTrait;
    public function render()
    {
        return view('livewire.markdown-save');
    }
}

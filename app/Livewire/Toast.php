<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Toast extends Component
{
    
    public $message;
    public function render()
    {
        return view('livewire.toast', [
            'message' => $this->message
        ]); 
    }

    #[On('toast')]
    public function toast($message)
    {
        $this->message = $message;
        $this->dispatch('toast-show');
    }

    #[On('clear-toast')]
    public function clearMessage()
    {
        $this->message = null;
    }


}

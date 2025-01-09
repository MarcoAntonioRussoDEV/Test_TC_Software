<?php

namespace App\Livewire;

use Livewire\Component;

class RowComponent extends Component
{
    public $task;
    public $actions = [
        "edit",
        "delete"
    ];

    public function render()
    {
        return view('livewire.row-component', [
            'task' => $this->task,
            'actions' => $this->actions
        ]);
    }
}

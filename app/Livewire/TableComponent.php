<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\On;

class TableComponent extends Component
{

    public $className;


    public function render()
    {
        return view('livewire.table-component', [
            'tasks' => Task::all(),
            'className' => $this->className,
        ]);
    }


    public function openModal()
    {
        $this->dispatch('openModal');
    }

    public function create($task)
    {
        Task::create($task);
    }
    public function delete($id)
    {
        Task::destroy($id);
    }

}

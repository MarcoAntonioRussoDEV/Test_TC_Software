<?php

namespace App\Livewire\Desktop;

use Livewire\Component;
use App\Models\Task;
use App\Models\Status;

class Dropdown extends Component
{
    public $actions, $taskID;

    public function render()
    {
        return view('livewire.desktop.dropdown');
    }

    public function mount($actions)
    {
        $this->actions = $actions;
    }

    public function delete($id)
    {
        $this->dispatch('deleteTask', $id);
    }

    public function edit($id)
    {
        $this->dispatch('editTask', $id);
    }

    public function setCompleted($id)
    {
        $task = Task::find($id);
        $status = Status::where('name', 'completed')->first();

        if ($task && $status) {
            $task->status = $status->name;
            $task->completed_at = now();
            $task->save();
            $this->dispatch('refreshTasks');
            $this->dispatch('toast', 'Task marked as completed.');
        } else {
            logger('Task or Status not found');
        }
    }
}

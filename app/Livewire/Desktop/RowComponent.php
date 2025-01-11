<?php

namespace App\Livewire\Desktop;

use App\Livewire\Traits\CheckMultiSelect;
use App\Models\Status;
use App\Models\Task;
use Carbon\Carbon;
use Livewire\Component;

class RowComponent extends Component
{
    public $task;
    public $actions = [
        "edit" => "warning",
        "delete" => "error"
    ];

    public function render()
    {
        return view('livewire.desktop.row-component', [
            'task' => $this->task,
            'actions' => $this->actions
        ]);
    }

    public function toggleStatus($id)
    {
        $task = Task::find($id);
        $status = Status::where('name', 'completed')->first();

        if ($task && $status) {
            $task->status = $task->status === 'completed' ? 'pending' : 'completed';
            $task->completed_at = $task->status === 'completed' ? now() : null;
            $task->save();
            $this->dispatch('refreshTasks');
            $this->dispatch('toast', 'Task status updated.');
        } else {
            logger('Task or Status not found');
        }

        $this->checkMultiselect();
    }

    public function checkMultiselect(){
        $tasks = Task::all();
        if($tasks->every(fn($task) => $task->status === 'completed')){
            $this->dispatch("selectMultiSelect");
        }else if($tasks->every(fn($task) => $task->status === 'pending')){
            $this->dispatch("deselectMultiSelect");
        }
    }

 

 
}

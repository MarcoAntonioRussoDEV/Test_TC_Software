<?php

namespace App\Livewire\Mobile;

use App\Livewire\Desktop\RowComponent as DesktopRowComponent;
use App\Livewire\Traits\CheckMultiSelect;
use App\Models\Status;
use App\Models\Task;
use Livewire\Component;

class RowComponent extends Component
{

    public $task;
    public function render()
    {
        return view('livewire.mobile.row-component');
    }

    public function show()
    {
        $this->dispatch('showModal', $this->task->id);
    }

    public function toggleStatus($id)
    {
        $task = Task::find($id);
        $status = Status::where('name', 'completed')->first();

        if ($task && $status) {
            $task->status = $task->status === 'completed' ? 'pending' : 'completed';
            $task->completed_at = $task->status === 'completed' ? now() : null;
            $task->save();
            $this->dispatch('mobile.refreshTasks');
            $this->dispatch('toast', 'Task status updated.');
        } else {
            logger('Task or Status not found');
        }

        $this->checkMultiselect();
    }

    public function checkMultiselect()
    {
        $this->dispatch("mobile.checkMultiselect");
    }
}

<?php

namespace App\Livewire;

use App\Livewire\Traits\CheckMultiSelect;
use App\Livewire\Traits\FilterTasks;
use App\Livewire\Traits\MultiSelectTrait;
use App\Livewire\Traits\TaskHooks;
use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\On;

class Drawer extends Component
{
    use TaskHooks;

    public  $className,
        $sortColumn,
        $sortDirection,
        $isCheckedMultiSelect,
        $isFilterCompleted,
        $columns;

    public $originalFilters;

    public function mount(
        $sortColumn,
        $sortDirection,
        $isCheckedMultiSelect,
        $isFilterCompleted,
        $columns
    ) {
        $this->originalFilters = [
            'sortColumn' => $sortColumn,
            'sortDirection' => $sortDirection,
            'isCheckedMultiSelect' => $isCheckedMultiSelect,
            'isFilterCompleted' => $isFilterCompleted,
        ];

        $this->sortColumn = $sortColumn;
        $this->sortDirection = $sortDirection;
        $this->isCheckedMultiSelect = $isCheckedMultiSelect;
        $this->isFilterCompleted = $isFilterCompleted;
        $this->columns = $columns;
    }
    public function render()
    {
        $this->checkMultiselect();
        return view('livewire.drawer');
    }

    // #[On('mobile.toggleStatusAll')]
    // public function toggleStatusAll()
    // {
    //     if ($this->isCheckedMultiSelect) {
    //         Task::where('status', 'completed')->update(['status' => 'pending']);
    //     } else {
    //         Task::where('status', 'pending')->update(['status' => 'completed']);
    //     }
    //     $this->isCheckedMultiSelect = !$this->isCheckedMultiSelect;
    //     $this->dispatch('mobile.refreshTasks');
    //     $this->dispatch('toast', 'All tasks status updated.');
    // }

    // #[On('mobile.deselectMultiSelect')]
    // public function deselectMultiSelect()
    // {
    //     $this->isCheckedMultiSelect = false;
    // }

    // #[On('mobile.selectMultiSelect')]
    // public function selectMultiSelect()
    // {
    //     $this->isCheckedMultiSelect = true;
    // }




    // #[On('mobile.checkMultiselect')]
    public function checkMultiselect()
    {
        $tasks = Task::all();
        if ($tasks->every(fn($task) => $task->status === 'completed')) {
            $this->isCheckedMultiSelect = true;
        } else if ($tasks->every(fn($task) => $task->status === 'pending')) {
            $this->isCheckedMultiSelect = false;
        }
    }

    public function toggleStatusAll()
    {
        if ($this->isCheckedMultiSelect) {
            Task::where('status', 'completed')->get()->each->setPending();
        } else {
            Task::where('status', 'pending')->get()->each->setCompleted();
        }
        $this->isCheckedMultiSelect = !$this->isCheckedMultiSelect;
        $this->updateTasks();
        $this->dispatch('toast', 'All tasks status updated.');
    }

    public function updateTasks()
    {
        $this->dispatch(
            'mobile.update',
            isFilterCompleted: $this->isFilterCompleted,
            sortColumn: $this->sortColumn,
            sortDirection: $this->sortDirection,
            isCheckedMultiSelect: $this->isCheckedMultiSelect
        );
    }


    public function resetFilters()
    {
        $this->sortColumn = $this->originalFilters['sortColumn'];
        $this->sortDirection = $this->originalFilters['sortDirection'];
        $this->isCheckedMultiSelect = $this->originalFilters['isCheckedMultiSelect'];
        $this->isFilterCompleted = $this->originalFilters['isFilterCompleted'];
        $this->updateTasks();
    }
}

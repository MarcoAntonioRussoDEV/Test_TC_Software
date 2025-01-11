<?php

namespace App\Livewire;

use App\Livewire\Traits\CheckMultiSelect;
use App\Livewire\Traits\FilterTasks;
use App\Livewire\Traits\MultiSelectTrait;
use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\On;

class Drawer extends Component
{

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
    )
    {
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

    #[On('mobile.toggleStatusAll')]
    public function toggleStatusAll()
    {
        if ($this->isCheckedMultiSelect) {
            Task::where('status', 'completed')->update(['status' => 'pending']);
        } else {
            Task::where('status', 'pending')->update(['status' => 'completed']);
        }
        $this->isCheckedMultiSelect = !$this->isCheckedMultiSelect;
        $this->dispatch('mobile.refreshTasks');
        $this->dispatch('toast', 'All tasks status updated.');
    }

    #[On('mobile.deselectMultiSelect')]
    public function deselectMultiSelect()
    {
        $this->isCheckedMultiSelect = false;
    }

    #[On('mobile.selectMultiSelect')]
    public function selectMultiSelect()
    {
        $this->isCheckedMultiSelect = true;
    }


    public function checkMultiselect(){
        $tasks = Task::all();
        if($tasks->every(fn($task) => $task->status === 'completed')){
            $this->dispatch("mobile.selectMultiSelect");
        }else if($tasks->every(fn($task) => $task->status === 'pending')){
            $this->dispatch("mobile.deselectMultiSelect");
        }
    }

    public function updateFilters()
    {
        $this->dispatch('updateFilterCompleted', 
                        isFilterCompleted: $this->isFilterCompleted,
                        sortColumn: $this->sortColumn,
                        sortDirection: $this->sortDirection
        );
    }

    public function updatedSortColumn()
    {
        $this->updateFilters();
    }

    public function updatedSortDirection()
    {
        $this->updateFilters();
    }
    
    public function updatedIsFilterCompleted()
    {
        $this->updateFilters();
    }

    public function updatedIsCheckedMultiselect()
    {
        $this->updateFilters();
    }

    public function resetFilters()
    {   
        $this->sortColumn = $this->originalFilters['sortColumn'];
        $this->sortDirection = $this->originalFilters['sortDirection'];
        $this->isCheckedMultiSelect = $this->originalFilters['isCheckedMultiSelect'];
        $this->isFilterCompleted = $this->originalFilters['isFilterCompleted'];
        $this->updateFilters();
    }

    
}

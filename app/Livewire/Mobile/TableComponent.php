<?php

namespace App\Livewire\Mobile;

use App\Livewire\Desktop\TableComponent as DesktopTableComponent;
use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\On;
use stdClass;

class TableComponent extends Component
{

    public  $className,
            $refreshKey,
            $tasks,
            $columns,
            $sortColumn = 'id',
            $sortDirection = 'ASC',
            $isCheckedMultiSelect = false,
            $isFilterCompleted = true,
            $search;

    


    public function mount()
    {
        $this->tasks = Task::orderBy($this->sortColumn, $this->sortDirection)->get();
        $this->columns = [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'completed_at' => 'Completed At',
        ];
        $this->refreshKey = now();
    }
    public function render()
    {
        return view('livewire.mobile.table-component', [
            'tasks' => $this->tasks,
            'className' => $this->className,
            'columns' => $this->columns,
            'sortColumn' => $this->sortColumn,
            'sortDirection' => $this->sortDirection,
        ]);
    }


    public function openModal()
    {
        $this->dispatch('openModal');
    }

    #[On('mobile.refreshTasks')]
    public function updateTasks()
    {
        if($this->search){
            $this->searchTask($this->search);
            return;
        }
        if ($this->isFilterCompleted) {
            $this->tasks = Task::orderBy($this->sortColumn, $this->sortDirection)->get();
        } else {
            $this->tasks = Task::where('status', '!=', 'completed')
                ->orderBy($this->sortColumn, $this->sortDirection)
                ->get();
        }

        $this->refreshKey = now();
    }

    #[On('mobile.searchTask')]
    public function searchTask($search)
    {
        $this->search = $search;
        $this->tasks = Task::where('title', 'like', "%$this->search%")
            ->orWhere('description', 'like', "%$this->search%")
            ->orWhere('status', 'like', "%$this->search%")
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->get();

        if (!$this->isFilterCompleted) {
            $this->tasks = $this->tasks->filter(function ($task) {
                return $task->status != 'completed';
            });
        }
        $this->refreshKey = now();
    }


    #[On('mobile.sortColumn')]
    public function sortColumn($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'ASC' ? 'DESC' : 'ASC';
        } else {
            $this->sortColumn = $column;
            $this->sortDirection = 'ASC';
        }
    }


    #[On('updateFilterCompleted')]
    public function updateFilterCompleted(
        $isFilterCompleted,
        $sortColumn,
        $sortDirection
    )
    {
        $this->isFilterCompleted = $isFilterCompleted;
        $this->sortColumn = $sortColumn;
        $this->sortDirection = $sortDirection;
        $this->updateTasks();
    }
    
}

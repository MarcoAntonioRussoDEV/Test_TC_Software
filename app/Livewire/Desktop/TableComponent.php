<?php

namespace App\Livewire\Desktop;

use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\On;

class TableComponent extends Component
{

    
    public $className,
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
        $this->checkMultiselect();
        return view('livewire.desktop.table-component', [
            'tasks' => $this->tasks,
            'className' => $this->className,
            'columns' => $this->columns,
            'sortColumn' => $this->sortColumn,
            'sortDirection' => $this->sortDirection,
        ]);
    }

    #[On('refreshTasks')]
    public function updatedTasks()
    {
        $this->tasks = Task::orderBy($this->sortColumn, $this->sortDirection)->get();
        $this->refreshKey = now();
    }

    #[On('setTasks')]
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;
    }

    #[On('sortColumn')]
    public function sortColumn($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'ASC' ? 'DESC' : 'ASC';
        } else {
            $this->sortColumn = $column;
            $this->sortDirection = 'ASC';
        }
        $this->updatedTasks();
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

    #[On('toggleStatusAll')]
    public function toggleStatusAll()
    {
        if ($this->isCheckedMultiSelect) {
            Task::where('status', 'completed')->get()->each->setPending();
        } else {
            Task::where('status', 'pending')->get()->each->setCompleted();
        }
        $this->isCheckedMultiSelect = !$this->isCheckedMultiSelect;
        $this->dispatch('refreshTasks');
        $this->dispatch('toast', 'All tasks status updated.');
    }

    #[On('deselectMultiSelect')]
    public function deselectMultiSelect()
    {
        $this->isCheckedMultiSelect = false;
    }

    #[On('selectMultiSelect')]
    public function selectMultiSelect()
    {
        $this->isCheckedMultiSelect = true;
    }

    public function toggleFilterCompleted()
    {
        $this->isFilterCompleted = !$this->isFilterCompleted;
        $this->handleFilter();
        $this->searchTask($this->search ?? "");
    }

    #[On('refreshTasks')]
    public function handleFilter()
    {
        if ($this->isFilterCompleted) {
            $this->tasks = Task::orderBy($this->sortColumn, $this->sortDirection)->get();
        } else {
            $this->tasks = Task::where('status', '!=', 'completed')
                ->orderBy($this->sortColumn, $this->sortDirection)
                ->get();
        }
        $this->refreshKey = now();
    }

    #[On('searchTask')]
    public function searchTask($search)
    {
        $this->search = $search;
        $this->tasks = Task::where('title', 'like', "%$this->search%")
            ->orWhere('description', 'like', "%$this->search%")
            ->orWhere('status', 'like', "%$this->search%")
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->get();

        if(!$this->isFilterCompleted){
            $this->tasks = $this->tasks->filter(function($task){
                return $task->status != 'completed';
            });
        }
        $this->refreshKey = now();
    }

    public function checkMultiselect(){
        $tasks = Task::all();
        if($tasks->every(fn($task) => $task->status === 'completed')){
            $this->isCheckedMultiSelect = true;
        }else if($tasks->every(fn($task) => $task->status === 'pending')){
            $this->isCheckedMultiSelect = false;
        }
    }

}

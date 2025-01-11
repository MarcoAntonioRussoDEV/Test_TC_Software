<?php

namespace App\Livewire\Traits;


trait TaskHooks
{

    public function updatedSortColumn()
    {
        $this->updateTasks();
    }

    public function updatedSortDirection()
    {
        $this->updateTasks();
    }
    
    public function updatedIsFilterCompleted()
    {
        $this->updateTasks();
    }

    public function updatedIsCheckedMultiselect()
    {
        $this->updateTasks();
    }
}
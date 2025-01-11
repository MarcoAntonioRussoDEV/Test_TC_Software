<?php

namespace App\Livewire\Desktop;

use App\Models\Task;
use Livewire\Component;

class FilterTableHead extends Component
{
    public $title, $column, $sortColumn, $sortDirection, $className;

    public function mount($title, $column, $sortColumn, $sortDirection)
    {
        $this->title = $title;
        $this->column = $column;
        $this->sortColumn = $sortColumn;
        $this->sortDirection = $sortDirection;
    }
    public function render()
    {
        return view('livewire.desktop.filter-table-head', [
            'title' => $this->title
        ]);
    }

    public function sort($column)
    {
        $this->dispatch("sortColumn", $column);
    }
}

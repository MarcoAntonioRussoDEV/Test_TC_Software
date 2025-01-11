<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Livewire\Attributes\On;

class TaskForm extends Component
{
    public $title,
        $description,
        $task_id,
        $isModalOpen = false;

    protected $rules = [
        'title' => 'required|max:40',
    ];

 

    public function render()
    {
        return view('livewire.task-form');
    }
    
    #[On('openModal')]
    public function openModal()
    {
        $this->isModalOpen = true;
        if($this->task_id){
            $this->validate();
        }
    }

    public function closeModal()
    {
        $this->reset(['title', 'description']);
        $this->isModalOpen = false;
    }

    public function create()
    {
        $this->validate();

        if ($this->task_id) {
            $task = Task::find($this->task_id);
            $task->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);
            $this->dispatch('toast', 'Task updated successfully.');
        } else {
            Task::create([
                'title' => $this->title,
                'description' => $this->description,
            ]);
            $this->dispatch('toast', 'Task created successfully.');
        }
        $this->task_id = null;
        $this->closeModal();
        $this->dispatch('refreshTasks');
        $this->dispatch('mobile.refreshTasks');
    }

    #[On('editTask')]
    public function edit($id)
    {
        $task = Task::find($id);
        $this->task_id = $task->id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->openModal();
    }
}

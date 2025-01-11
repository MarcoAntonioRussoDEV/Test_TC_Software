<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Livewire\Attributes\On;

class DestructiveModal extends Component
{
    public $task_id, $task;
    public $isModalOpen = false;


    
    public function render()
    {
        $this->task = $this->task_id ? Task::find($this->task_id) : null;
        return view('livewire.destructive-modal', [
            'isModalOpen' => $this->isModalOpen,
            "task" => $this->task
        ]);
    }

    #[On('deleteTask')]
    public function openModal($id)
    {   
        $this->task_id = $id;
        $this->isModalOpen = true;
        
    }

    public function delete()
    {
        Task::destroy($this->task_id);
        $this->closeModal();
        $this->dispatch("toast", "Task deleted successfully.");
        $this->dispatch("refreshTasks");
        $this->dispatch("mobile.refreshTasks");
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->reset("task_id");
    }
    

}

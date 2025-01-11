<?php

namespace App\Livewire\Mobile;

use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\On;

class ShowModal extends Component
{
    public $task, $isModalOpen = false;

    public function mount()
    {
        $this->task = Task::find(1);
    }
    public function render()
    {
        return view('livewire.mobile.show-modal');
    }

    #[On("showModal")]
    public function openModal($taskId)
    {
        $this->task = Task::find($taskId);
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->reset("task");
    }

    public function edit()
    {
        $this->dispatch('editTask', $this->task->id);
        $this->closeModal();
    }

    public function delete()
    {   
        $this->dispatch('deleteTask', $this->task->id);
        $this->closeModal();
    }
    
    
}

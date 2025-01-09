<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Livewire\Attributes\On;

class TaskForm extends Component
{
    public $title, $description, $isModalOpen = false;

    protected $rules = [
        'title' => 'required|max:40',
    ];

    

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.task-form');
    }


    #[On('openModal')]
    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->reset(['title', 'description']);
        $this->isModalOpen = false;
    }

    public function create()
    {
        $this->validate();

        Task::create([
            'title' => $this->title,
            'description' => $this->description
        ]);

        $this->closeModal();
        $this->dispatch('toast', 'Task created successfully.');
    }
}

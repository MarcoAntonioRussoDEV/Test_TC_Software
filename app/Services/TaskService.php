<?php

namespace App\Services;


use App\Models\Task;


class TaskService
{
    private $tasks;

    public function __construct()
    {
        $this->tasks = Task::all();
    }

    public function getTasks()
    {
        return $this->tasks;
    }

    public function getAllTasks()
    {
        return Task::all();
    }

    public function getTaskById($id)
    {
        return Task::find($id);
    }

    public function createTask($data)
    {
        return Task::create($data);
    }

    public function updateTask($id, $data)
    {
        $task = Task::find($id);
        if ($task) {
            $task->update($data);
            return $task;
        }
        return null;
    }

    public function deleteTask($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            return true;
        }
        return false;
    }

    public function reloadTasks($query)
    {
        $this->tasks = $query->get();
    }
}
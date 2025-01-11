<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class DeleteTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:delete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a task by id';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $taskID = $this->argument('id');
        $task = Task::findOr($taskID, function () {
            $this->error('Task not found');
            return null;
        });
        $task->delete();
        $this->info('Task deleted successfully');
    }
}

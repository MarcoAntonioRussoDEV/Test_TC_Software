<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;

class CreateTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:create {title} {description?} {--status=pending}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new task';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->argument('title');
        $this->argument('description');
        $this->option('status');

        $task = Task::create([
            'title' => $this->argument('title'),
            'description' => $this->argument('description'),
            'status' => $this->option('status'),
        ]);

        $this->info('Task created: ' . $task->title);
    }
}

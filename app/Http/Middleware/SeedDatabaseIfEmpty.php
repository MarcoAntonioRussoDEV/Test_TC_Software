<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Models\Task;

class SeedDatabaseIfEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Task::count() === 0) {
            Artisan::call('db:seed', [
                '--class' => 'DatabaseSeeder',
            ]);
        }

        return $next($request);
    }
}

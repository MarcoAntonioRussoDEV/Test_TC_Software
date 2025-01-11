<div class="flex items-center gap-3 justify-start border-b border-base-secondary p-2  hover:bg-base-secondary group duration-150" >
    <label>
        <input type="checkbox" class="checkbox" wire:change="toggleStatus({{ $task->id }})"
            @if ($task->status === 'completed') checked @endif /> 
    </label>
    <div class="cursor-pointer flex justify-between w-full" wire:click="show({{ $task->id }})">
        <div>
            <h1 class="text-xl group-hover:scale-[1.02] duration-150">{{ $task->title }}</h1>
            <p class="text-xs text-secondary"> {{ $task->created_at }}</p>
        </div>
        <div class="flex items-center gap-2 justify-start">
            <div @class([
                'badge  w-20 p-2',
                'badge-success' => $task->status === 'completed',
                'badge-warning' => $task->status === 'pending',
            ])>{{ $task->status }}</div>
            <div>
                <x-heroicon-o-chevron-right class="h-8 w-6" />
            </div>
        </div>
    </div>
</div>

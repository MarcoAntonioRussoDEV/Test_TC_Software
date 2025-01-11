<tr class="hover:bg-base-secondary duration-150">
    <th>
        <label>
            <input type="checkbox" class="checkbox" wire:change="toggleStatus({{ $task->id }})"
                @if ($task->status === 'completed') checked @endif /> 
        </label>
    </th>
    <td>
        <div class="font-bold">{{ $task->id }}</div>
    </td>
    <td>
        <div class="flex items-center gap-3">
            <div>
                <div class="font-bold">{{ $task->title }}</div>
            </div>
        </div>
    </td>
    <td>
        <div class="max-w-64">{{ $task->description }}</div>
    </td>
    <td>
        <div @class([
            'badge badge-success' => $task->status === 'completed',
            'badge badge-warning' => $task->status === 'pending',
            'p-3 w-full',
        ])>{{ Str::upper($task->status) }}</div>
    </td>
    <td>
        <div>{{ Str::upper($task->created_at) }}</div>
    </td>
    <td>
        <div>{{ Str::upper($task->completed_at ?? '---') }}</div>
    </td>
    <th>
        <livewire:desktop.dropdown :actions="$actions" :taskID="$task->id" />
    </th>
</tr>

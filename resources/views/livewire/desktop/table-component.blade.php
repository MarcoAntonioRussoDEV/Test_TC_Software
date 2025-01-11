<div class=" {{ $className }}">
    <div class="px-3">
        <livewire:search-bar className="w-full" />
    </div>
    <div class="flex justify-between items-center px-4 mt-2">
        <label for="toggle-completed " class="flex items-center gap-2">
            <p>Show completed</p>
            <input name="toggle-completed" type="checkbox" class="toggle" @checked($isFilterCompleted)
                wire:change="toggleFilterCompleted" />
        </label>

        <button class="btn btn-sm btn-info" wire:click="openModal">New Task</button>

    </div>

    <table class="table mt-10">
        <!-- head -->
        <thead>
            <tr>
                <th>
                    <label>
                        <input type="checkbox" class="checkbox" wire:change="toggleStatusAll"
                            @checked($isCheckedMultiSelect) />
                    </label>
                </th>
                @foreach ($columns as $column => $title)
                    <livewire:desktop.filter-table-head :title="$title" :column="$column" :sortDirection="$sortDirection"
                        :sortColumn="$sortColumn" :key="$column . '-' . $refreshKey" />
                @endforeach
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
                <livewire:desktop.row-component :task="$task" :key="$task->id . '-' . $refreshKey" />
            @empty
                <tr>
                    <td colspan="{{ count($columns) + 2 }}" class="text-center">No tasks found</td>
                </tr>
            @endforelse
        </tbody>
        <!-- foot -->
        {{-- <tfoot>
            <tr>
                <th></th>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>STATUS</th>
                <th>Actions</th>
            </tr>
        </tfoot> --}}
    </table>
</div>

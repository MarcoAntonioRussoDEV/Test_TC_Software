<div class="drawer drawer-end z-20 {{ $className }}">
    <input id="mobile-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
    </div>
    <div class="drawer-side">
        <label for="mobile-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <div class="text-base-content min-h-full w-80 p-4 menu bg-base-200">
            <h2 class="font-bold text-lg">Filters</h2>

            <ul class="mt-2">
                <li>
                    {{-- SetAllTasksCompleted --}}
                    <label class="flex items-center gap-3 justify-between">
                        <p class="text-sm italic text-secondary">Set all tasks as
                            {{ $isCheckedMultiSelect ? 'pending' : 'completed' }}</p>
                        <input type="checkbox" class="checkbox " wire:change="toggleStatusAll"
                            @checked($isCheckedMultiSelect) />
                    </label>
                </li>
                <li>
                    {{-- ShowCompleted --}}
                    <label for="toggle-completed " class="flex items-center gap-3 justify-between">
                        <p class="text-sm italic text-secondary">Show completed</p>
                        <input name="toggle-completed" type="checkbox" class="toggle" wire:model.live="isFilterCompleted" />
                    </label>
                </li>
                <li>
                </li>
                {{-- SortDirection --}}
                <li>
                    <label for="toggle-completed " class="flex items-center gap-3 justify-between">
                        <p class="text-sm italic text-secondary">Sort direction</p>
                        <select wire:model.live="sortDirection" class="select select-sm select-bordered">
                            <option value="ASC">ASC</option>
                            <option value="DESC">DESC</option>
                        </select>
                    </label>
                </li>
                {{-- SortBy --}}
                <li>
                    <label for="toggle-completed " class="flex items-center gap-3 justify-between">
                        <p class="text-sm italic text-secondary">Sort by</p>
                        <select wire:model.live="sortColumn" class="select select-sm select-bordered">
                            @foreach ($columns as $column)
                                <option value="{{ $column }}">{{ $column }}</option>
                            @endforeach
                        </select>
                    </label>
                </li>
                <li>
                    <button wire:click='resetFilters' class="btn btn-ghost btn-sm text-secondary italic mt-10">reset
                        filters</button>
                </li>
            </ul>
        </div>
    </div>
</div>

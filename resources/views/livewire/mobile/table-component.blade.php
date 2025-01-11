<div class="grid grid-cols-1 gap-4 {{ $className }}">

    {{-- SearchBar --}}
    <div class="join w-full px-2">
        <livewire:search-bar className="join-item w-full" />
        <label class="join-item btn btn-sm border-border-input btn-outline drawer-button" for="mobile-drawer">
            <x-heroicon-m-adjustments-horizontal class="w-5 h-5" />
        </label>
    </div>
    {{-- Filters --}}
    <div class="flex justify-between items-center px-2">
        {{-- <label class="flex items-center gap-3">
            <input type="checkbox" class="checkbox " wire:change="toggleStatusAll" @checked($isCheckedMultiSelect) />
            <p class="text-sm italic text-secondary">Select All</p>
        </label> --}}
        {{-- <label for="toggle-completed " class="flex items-center gap-3">
            <input name="toggle-completed" type="checkbox" class="toggle" @checked($isFilterCompleted)
                wire:change="toggleFilterCompleted" />
            <p class="text-sm italic text-secondary">Show completed</p>
        </label> --}}

    </div>
    {{-- Table --}}

    <div class="group group-last:border-b-0">
        @forelse ($tasks as $task)
            <livewire:mobile.row-component :task="$task" :key="$task->id . '-' . $refreshKey" />
        @empty
            <p class="text-center italic">No Tasks found</p>
        @endforelse
    </div>
    <livewire:drawer :sortColumn="$sortColumn" :sortDirection="$sortDirection" :isCheckedMultiSelect="$isCheckedMultiSelect" :isFilterCompleted="$isFilterCompleted" :columns="$columns" />

    <button class="btn btn-circle btn-info opacity-50 hover:opacity-100 fixed bottom-0 right-0 m-5 z-10"
        wire:click="openModal">
        <x-heroicon-o-plus class="h-6 w-6" />
    </button>
</div>

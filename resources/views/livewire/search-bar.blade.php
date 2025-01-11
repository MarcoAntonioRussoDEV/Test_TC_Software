<div class="relative w-full">
    <span class="sr-only">Search</span>
  <span class="absolute inset-y-0 left-0 flex items-center pl-2">
    <x-heroicon-c-magnifying-glass class="w-4 h-4 text-secondary z-10" />
  </span>
        <input class="input input-sm input-bordered {{ $className}} pl-8" type="search" wire:model.live='search' placeholder="Search" />
        @if($search)
            <button type="button" class="absolute right-2 top-1/2 transform -translate-y-1/2" wire:click="$set('search', '')">
                <svg class="w-5 h-5 text-gray-500 hover:text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        @endif
</div>

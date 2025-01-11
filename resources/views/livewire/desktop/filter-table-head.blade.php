<th wire:click="sort('{{ $column }}')" class="cursor-pointer">
    <div class="flex gap-2 items-center">
        <p @class([
            'font-black text-info' => $sortColumn === Str::lower($column),
        ])>{{ $title }}</p>
        @if ($sortColumn === Str::lower($column))
            @if ($sortDirection === 'ASC')
            <x-heroicon-o-chevron-down class="w-4 h-4" />
            @else
            <x-heroicon-o-chevron-up class="w-4 h-4" />
            @endif
        @endif
    </div>
</th>

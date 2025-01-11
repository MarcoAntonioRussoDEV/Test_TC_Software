<div class="dropdown">
    <div tabindex="0" role="button" class="btn m-1">Actions</div>
    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-fit p-2 shadow border border-border-input">
        {{-- <button class="btn btn-ghost hover:text-success" wire:click="setCompleted({{ $taskID }})">{{ Str::ucfirst('complete') }}
        </button> --}}
        <button class="btn btn-ghost hover:text-warning" wire:click="edit({{ $taskID }})">{{ Str::ucfirst('edit') }}
        </button>
        <button class="btn btn-ghost hover:text-error"
            wire:click="delete({{ $taskID }})" >{{ Str::ucfirst('delete') }}</button>
    </ul>
</div>

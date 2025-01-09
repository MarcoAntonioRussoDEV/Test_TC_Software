<div class="dropdown">
    <div tabindex="0" role="button" class="btn m-1">Actions</div>
    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
        @foreach ($actions as $action)
            <button class="btn btn-ghost"{{--  wire:click="selectItem({{ $action }})" --}}>{{ $action }}</button>
        @endforeach
    </ul>
</div>
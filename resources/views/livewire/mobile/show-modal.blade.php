<dialog id="show-modal" @class([
    'modal',
    'modal-bottom',
    'sm:modal-middle',
    'cursor-pointer' => $isModalOpen,
    'modal-open' => $isModalOpen,
])>
    @if ($task !== null)
        <div id="show-modal-box" class="modal-box cursor-default">
            <h3 class="text-xl font-bold">{{ $task->title }}</h3>
            <p class="py-4 text-sm text-secondary italic">Comlpleted at: <span
                    class="text-accent font-bold not-italic">{{ $task->completed_at }}</span></p>
            <div class="form-control mt-4">
                <p class="text-secondary">{{ $task->description }}</p>
                <div class="modal-action flex items-center justify-between">
                    <button class="btn btn-sm btn-ghost hover:bg-warning hover:text-warning-content"
                        wire:click="edit">Edit</button>
                    <button type="submit" class="btn btn-sm hover:bg-error hover:text-error-content"
                        wire:click="delete({{ $task->id }})">Delete</button>
                </div>
            </div>
    @endif
</dialog>
@script
    <script>
        document.addEventListener('click', function(event) {
            const modal = document.querySelector('#show-modal');
            const modalBox = document.querySelector('#show-modal-box');
        
            if (modal && modalBox && !modalBox.contains(event.target) ) {
                $wire.call('closeModal');
            }
        });
    </script>
@endscript
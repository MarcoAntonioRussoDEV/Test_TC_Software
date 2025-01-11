<dialog @class(["modal modal-bottom sm:modal-middle", "modal-open" => $isModalOpen]) >
@if($task !== null)
  <div class="modal-box">
    <h3 class="text-lg font-bold">"{{$task->title}}"</h3>
    <p class="py-4">Are you sure you want to delete this task?</p>
    <div class="modal-action">
        <button wire:click="closeModal" class="btn">Cancel</button>
        <button wire:click="delete({{$task->id}})" class="btn btn-error text-white">Confirm</button>
    </div>
  </div>
  @endif
</dialog>
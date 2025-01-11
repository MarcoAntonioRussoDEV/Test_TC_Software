<dialog  @class(["modal", "modal-bottom", "sm:modal-middle", "modal-open" => $isModalOpen])>
  <div class="modal-box">
    <h3 class="text-lg font-bold">{{ $task_id ? "Edit" : "Create"}} Task</h3>
    <form wire:submit.prevent="create" method="post">
      @csrf
      <div class="form-control">
          <label class="label">
            <span class="label-text">Title</span>
          </label>
          <input type="text" placeholder="Title" @class(["input", "input-bordered", "input-error" => $errors->has("title")]) wire:model.live="title" />
          @error("title") <span class="text-error text-sm mt-2">{{ $message }}</span> @enderror
          <label class="label">
            <span class="label-text
            ">Description</span>
          </label>
          <textarea placeholder="Description" @class(["textarea", "textarea-bordered", "textarea-error" => $errors->has("description")]) wire:model.live="description"></textarea>
          @error("description") <span class="text-error text-sm mt-2">{{ $message }}</span> @enderror
          
          <div class="modal-action flex items-center justify-between">
            <button class="btn btn-sm btn-ghost" wire:click="closeModal">Cancel</button>
            <button type="submit" class="btn btn-sm">Confirm</button>
            </div>
          </form>
  </div>
</dialog>
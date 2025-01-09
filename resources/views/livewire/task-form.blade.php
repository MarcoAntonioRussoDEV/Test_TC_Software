<dialog  @class(["modal", "modal-bottom", "sm:modal-middle", "modal-open" => $isModalOpen])>
  <div class="modal-box">
    <h3 class="text-lg font-bold">Create Task</h3>
    <form wire:submit.prevent="create" method="post">
      @csrf
      <div class="form-control">
          <label class="label">
            <span class="label-text">Title</span>
          </label>
          <input type="text" placeholder="Title" @class(["input", "input-bordered", "input-error" => $errors->has("title")]) wire:model.live="title" />
          @error("title") <span class="text-red-500 text-sm mt-2">{{ $message }}</span> @enderror
          <label class="label">
            <span class="label-text
            ">Description</span>
          </label>
          <textarea placeholder="Description" @class(["textarea", "textarea-bordered", "textarea-error" => $errors->has("description")]) wire:model.live="description"></textarea>
          @error("description") <span class="text-red-500 text-sm mt-2">{{ $message }}</span> @enderror
          
          <button type="submit" class="btn">Confirm</button>
    </form>
    <p class="py-4">Press ESC key or click the button below to close</p>
    <div class="modal-action">
      <form method="dialog">
        <!-- if there is a button in form, it will close the modal -->
        <button class="btn" wire:click="closeModal">Close</button>
      </form>
    </div>
  </div>
</dialog>
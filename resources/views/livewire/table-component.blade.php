<div class="overflow-x-auto {{ $className}}">
<button class="btn" wire:click="openModal">open modal</button>

    <table class="table">
        <!-- head -->
        <thead>
            <tr>
                <th>
                    <label>
                        <input type="checkbox" class="checkbox" />
                    </label>
                </th>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>STATUS</th>
                <th>Actions</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            @include('livewire.row-component', ['task' => $task])
            @endForeach
        </tbody>
        <!-- foot -->
        <tfoot>
            <tr>
                <th></th>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>STATUS</th>
                <th>Actions</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>

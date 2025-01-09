<tr>
    <th>
        <label>
            <input type="checkbox" class="checkbox" />
        </label>
    </th>
    <td>
        <div class="font-bold">{{ $task->id }}</div>
    </td>
    <td>
        <div class="flex items-center gap-3">
            {{-- <div class="avatar">
          <div class="mask mask-squircle h-12 w-12">
            <img
              src="https://img.daisyui.com/images/profile/demo/2@94.webp"
              alt="Avatar Tailwind CSS Component" />
          </div>
        </div> --}}
            <div>
                <div class="font-bold">{{ $task->title }}</div>
            </div>
        </div>
    </td>
    <td>
        <div>{{ $task->description }}</div>
    </td>
    <td>
        <div>{{ Str::upper($task->status) }}</div>
    </td>
    <th>
        {{dd($actions)}}
        <div class="btn btn-ghost btn-xs">
            <livewire:dropdown :actions="$actions" />
        </div>
    </th>
</tr>

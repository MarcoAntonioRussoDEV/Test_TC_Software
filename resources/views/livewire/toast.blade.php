<div class="toast toast-end">
    @if ($message !== null)
        <div class="alert alert-success flex">
            <p class="text-center">{{ $message }}</p>
        </div>
        @script
        <script>
           $wire.on("toast-show", () =>{ 
               setTimeout(() => {
                   $wire.dispatch("clear-toast");
               }, 3000);
           });
        </script>
        @endscript
    @endif
</div>

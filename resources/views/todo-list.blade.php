<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="container mx-auto p-4 max-w-screen flex flex-col gap-4 relative" data-theme="mytheme">
    <h1 id="title" class="text-4xl text-center">{{ config('app.name') }}</h1>
    <livewire:desktop.table-component className="hidden xl:block" />
    <livewire:mobile.table-component className="xl:hidden block" />
    <livewire:task-form />
    <livewire:toast />
    <livewire:destructive-modal />
    <livewire:mobile.show-modal />

 
   
</body>

</html>

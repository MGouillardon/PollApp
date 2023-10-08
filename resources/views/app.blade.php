<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poll App</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <div>
        <div>
            <h2 class="mb-4 mt-4 text-2xl">Create Poll</h2>
            <div class="space-y-3">
                @livewire('create-poll')
                @livewire('remove-all-polls')
            </div>
        </div>
    </div>
    <div>
        <h2 class="mb-4 mt-4 text-2xl">Available Polls</h2>
        @livewire('polls')
    </div>
    @livewireScripts
</body>

</html>

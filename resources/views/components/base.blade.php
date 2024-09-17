<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-gradient-to-r from-neutral-900 to-neutral-800 w-full">
    <div class="w-full font-outfit">
        <x-sidebar></x-sidebar>
        
        <div class="w-4/5 px-96 py-24 min-h-screen">{{ $slot }}</div>
    </div>
</body>
</html>
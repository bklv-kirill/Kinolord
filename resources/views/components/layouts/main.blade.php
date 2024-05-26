<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ $description }}">
    <title>{{ $title }}</title>
    @vite(['resources/styles/app.scss', 'resources/js/app.js'])
</head>
<body>
<x-main-header/>
<main class="main-container">
    {{ $slot }}
</main>
<x-main-footer/>
<div class="scroll-to-top-button"></div>
</body>
</html>

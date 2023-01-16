<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @production
        @include('google')
    @endproduction
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="color-scheme" content="light dark">

    <title>{{ config('app.name', 'Mhue') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="baaltor">
@include('default.header')
<div class="d-inline-flex">
    @include('config.header')

    <div class="p-3">
        {{ $slot }}
    </div>
</div>
</body>
</html>

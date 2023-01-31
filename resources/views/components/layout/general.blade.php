<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $title ?? config('app.name') }}</title>
    <x-meta-head></x-meta-head>
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            {{ $slot }}
        </div>
    </div>

@stack('scripts')
</body>
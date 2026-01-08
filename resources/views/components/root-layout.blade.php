<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WarBar 24</title>
        @stack('styles')
    </head>
    <body>
        {{ $slot }}
        @stack('scripts')
    </body>
</html>

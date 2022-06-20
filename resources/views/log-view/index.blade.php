<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Log View</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container mx-auto p-4">
            <div class="flex justify-between py-3">
                <h1 class="text-lg">Log Viewer - {{ $log }}</h1>
                <form id="log-form">
                    <select name="log" id="log" class="border-2 rounded border-blue-400 bg-white p-1" onchange="document.getElementById('log-form').submit();">
                        <option value="">-- Pilih Log --</option>
                        @foreach ($logs as $item)
                            <option value="{{ $item['value'] }}" {{ $item['value'] == $log ? 'selected' : '' }}>{{ $item['label'] }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <textarea class="text-xs h-auto w-full bg-gray-900 text-gray-300" rows="30">{{ $lines }}</textarea>
        </div>
    </body>
</html>

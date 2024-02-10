<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Светофор</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <div class="main">
        <div class="traffic-light">
            <div id="traffic-signal">
                <div id="green"></div>
                <div id="yellow"></div>
                <div id="red"></div>
            </div>
            <button onclick="runTraficSignal()">Вперед</button>
        </div>
        <table class="logs" border="1">
            <caption>Таблица логов</caption>         
            <tr style="display: none;"><td></td></tr>       
            @if(isset($logs) && !empty($logs))
                @foreach ($logs as $log)
                    <tr>
                        <td>{{ $log->log }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>

    <script type="module">
        startTrafficSignal()
    </script>
</body>
</html>

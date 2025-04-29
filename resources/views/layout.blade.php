<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    <title>Bookmark Manager</title>
</head>
<body class="bg-gray-100">
    {{$slot}}
</body>
</html>
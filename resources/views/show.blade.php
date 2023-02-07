<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $phrase->phrase }}</title>
</head>
<body>
    <h1>{{ $phrase->phrase }}</h1>
    <p>{{ $phrase->author}}</p>
    
    <img src="{{ $phrase->image }}" alt="{{ $phrase->phrase }} . 'photo'">

    <a href="{{ route('edit', $phrase->id) }}"><button type="button">Editar</button></a>
</body>
</html>
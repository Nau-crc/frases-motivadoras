<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phrase</title>
</head>

<body>
    <a href="{{ route('home') }}"><button>Regresar</button></a>
    <h2>{{ $phrase->phrase }}</h2>
    <p>{{ $phrase->author }}</p>

    <img src="{{ $phrase->image }}" alt="{{ $phrase->phrase }} . 'photo'">
</body>

</html>

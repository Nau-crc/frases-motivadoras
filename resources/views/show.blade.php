<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phrase</title>
</head>
<body>
    <h1>{{ $phrase }}</h1>
    
    <img src="{{ $phrase->image }}" alt="{{ $phrase->phrase }} . 'photo'">
</body>
</html>
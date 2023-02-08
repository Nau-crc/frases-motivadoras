@extends('layouts.head')

<body>
    <a href="{{ route('home') }}"><button>Regresar</button></a>
    <h2>{{ $phrase->phrase }}</h2>
    <p>{{ $phrase->author }}</p>
    <div class="ct-show-phrase-img">
        <img src="{{ $phrase->image }}" alt="{{ $phrase->phrase }} . 'photo'" class="phrase-img">
    </div>

</body>

</html>

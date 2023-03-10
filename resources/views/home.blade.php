@extends('layouts.head')

<body class="antialiased">
    <!-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                                                                                                            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
@else
    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                                                                                            @if (Route::has('register'))
    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
    @endif
                    @endauth
                </div>
            @endif
        </div> -->

    <div>
        <a href="{{ route('create') }}">Create Phrase</a>
        @if (count($phrases) >= 1)
            @foreach ($phrases as $phrase)
                <h1>{{ $phrase->phrase }}</h1>
                <p>{{ $phrase->author }}</p>
                <div class="ct-phrase-img">
                    <img src="{{ $phrase->image }}" class="phrase-img" alt="{{ $phrase->phrase }}">
                </div>
                <a href="{{ route('show', ['id' => $phrase->id]) }}"><button>See Phrase</button></a>
                <a href="{{ route('edit', ['id' => $phrase->id]) }}"><button>Edit Phrase</button></a>
                <form action="{{ route('destroy', ['id' => $phrase->id]) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button>Delete Phrase</button>
                </form>
            @endforeach
        @else
            <h1>NO HAY NADAAAAAAAAAAA</h1>
        @endif
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Page</title>
</head>

<body>
    <form action="{{ route('update', $phrase->id) }}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div>
            <label for="phrase">Phrase</label>
            <input type="text" name="phrase" value="{{ $phrase->phrase }}">
        </div>
        <div>
            <label for="author">Author</label>
            <input type="text" name="author" value="{{ $phrase->author }}">
        </div>
        <div>
            <label for="image">Image</label>
            <input type="text" name="image" value="{{ $phrase->image }}">
        </div>
        <div>
            <button type="submit">Save</button>
            <a href="{{ route('home') }}"><button type="button">Cancel</button></a>
        </div>
    </form>
</body>

</html>

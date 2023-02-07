<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
<form action="{{ route('edit', $phrase) }}" method="GET" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="{{ $phrase }}">{{ $phrase }}</label>
            <input type="text" name="phrase">
        </div>
        <div>
            <label for="{{ $author }}">{{ $author }}</label>
            <input type="text" name="{{ $author }}">
        </div>
        <div>
            <label for="{{ $image }}">{{ $image }}</label>
            <input type="text" name="{{ $image }}">
        </div>
        <div>
            <button type="submit">Save</button>
            <a href="{{ route('home') }}"><button type="button">Cancel</button></a>
        </div>
    </form>
</body>
</html>
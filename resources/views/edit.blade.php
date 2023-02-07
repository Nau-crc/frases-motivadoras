<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
<form action="" method="GET" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="{{ $phrase->phrase }}">Phrase</label>
            <input type="text" name="{{ $phrase->phrase }}" value="{{ $phrase->phrase }}">
        </div>
        <div>
            <label for="{{ $phrase->author }}">Author</label>
            <input type="text" name="{{ $phrase->author }}" value="{{ $phrase->author }}">
        </div>
        <div>
            <label for="{{ $phrase->image }}">Image</label>
            <input type="text" name="{{ $phrase->image }}" value="{{ $phrase->image }}">
        </div>
        <div>
            <button type="submit">Save</button>
            <a href="{{ route('home') }}"><button type="button">Cancel</button></a>
        </div>
    </form>
</body>
</html>
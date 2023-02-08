<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Page</title>
</head>

<body>
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="phrase">Phrase</label>
            <input type="text" name="phrase">
        </div>
        <div>
            <label for="author">Author</label>
            <input type="text" name="author">
        </div>
        <div>
            <label for="image">Image</label>
            <input type="text" name="image">
        </div>
        <div>
            <button type="submit">Save</button>
            <a href="{{ route('home') }}"><button type="button">Cancel</button></a>
        </div>
    </form>
</body>

</html>

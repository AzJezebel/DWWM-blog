<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories List</title>
</head>
<body>
    <h1>Categoies List</h1>

    @forelse ($categories as $category)
    <div>
        <h2>{{ $category->name }}</h2>
        
        @foreach ($category->articles as $article)
            <p>{{ $article->title }}</p>
        @endforeach
    </div>
    @empty
    <p>There is no categories available</p>
    @endforelse
</body>
</html>
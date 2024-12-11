<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <h1>Blog Articles</h1>
    <ul>
        @foreach($articles as $article)
            <li><a href="{{ route('blog.show', $article->slug) }}">{{ $article->title }}</a></li>
        @endforeach
    </ul>
</body>
</html>

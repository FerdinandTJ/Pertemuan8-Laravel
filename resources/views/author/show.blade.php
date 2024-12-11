<!DOCTYPE html>
<html>
<head>
    <title>Artikel oleh {{ $username }}</title>
</head>
<body>
    <h1>Artikel oleh: {{ $username }}</h1>
    
    <ul>
        @foreach($articles as $article)
            <li>
                <a href="/blog/{{ $article['slug'] }}">{{ $article['title'] }}</a>
            </li>
        @endforeach
    </ul>
</body>
</html>

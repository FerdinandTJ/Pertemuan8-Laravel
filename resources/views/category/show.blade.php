<!DOCTYPE html>
<html>
<head>
    <title>Artikel Kategori {{ $slug }}</title>
</head>
<body>
    <h1>Artikel dalam Kategori: {{ $slug }}</h1>
    
    <ul>
        @foreach($articles as $article)
            <li>
                <a href="/blog/{{ $article['slug'] }}">{{ $article['title'] }}</a>
            </li>
        @endforeach
    </ul>
</body>
</html>

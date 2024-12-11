<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
</head>
<body>
    <h1>Daftar Artikel Blog</h1>
    
    <ul>
        @foreach($articles as $article)
            <li>
                <a href="/blog/{{ $article['slug'] }}">{{ $article['title'] }}</a> oleh {{ $article['author'] }}
            </li>
        @endforeach
    </ul>
</body>
</html>

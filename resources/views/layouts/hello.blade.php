<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Best Laravel</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>

<ul>
    @foreach($articles as $article)
        <li>
{{--            <div class="blog-post">--}}
                <h2 class="blog-post-title"><a href="/articles/{{ $article->slug }}">{{ $article->title }}</a></h2>
                <p class="blog-post-meta">{{ $article->preview }}</p>
                <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }}</p>

                {{ $article->body }}
{{--            </div>--}}
        </li>
    @endforeach
</ul>

</body>
</html>

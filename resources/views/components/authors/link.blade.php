@props(['author'])

<a href="{{ route('posts.index', ["author" => $author->username]) }}">
    <h5 class="font-bold">{{ $author->name }}</h5>
</a>
<h6>Mascot at Laracasts</h6>
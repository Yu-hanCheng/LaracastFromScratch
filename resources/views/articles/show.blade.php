@extends ('layout')
@section ('content')
<div id="wrapper">
    <div id="page" class="container">
        <div id="content">
            <div class="title">
                <h2>{{ $article->title }}</h2>
            </div>
            <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
            <p><strong>{{ $article->excerpt }}</strong></p>
            {{ $article->body }}

            <p style="margin-top: 1em">
                @foreach($article->tags as $tag)
                <a href="{{ route('articles.index', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
                @endforeach
            </p>
            <ul>
                @foreach($article->replies as $reply)
                <li>
                    <a >{{ $reply->content }}</a>
                </li>
                @can ('update', $article)
                <form action="{{ route('bestReply.store', $reply->id) }}" method="post">
                    @csrf
                    <input type="submit" class="btn btn-primary"/>
                </form>
                @endcan
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
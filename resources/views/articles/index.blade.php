@extends ('layout')
@section ('content')
<div id="wrapper">
    <div id="page" class="container">
            @foreach ($articles as $article)
        <div id="content">
            <div class="title">
                <a href="/article/{{ $article->id}}"><h2>{{ $article->title }}</h2></a>
            </div>
            <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
            <p><a href="#">{{ $article->excerpt }}</a></p>
        </div>
            @endforeach
    </div>
</div>
@endsection
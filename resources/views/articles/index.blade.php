@extends ('layout')
@section ('content')
<div id="wrapper">
    <div id="page" class="container">
        @forelse ($articles as $article)
        <div id="content">
            <div class="title">
                <a href="{{ $article->path() }}">
                    <h2>{{ $article->title }}</h2>
                </a>
            </div>
            <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
            <p><a href="#">{{ $article->excerpt }}</a></p>
            <div>
                <span style="color:{{ $article->isLikeBy(current_user()) ? 'blue':'gray' }}">good</span>
            </div>

            <span>Likes {{ $article->likes ?: 0 }}</span>
            <span>disLikes {{ $article->disLikes ?: 0 }}</span>
        </div>
        @empty
        <p>No relevant articles yet.</p>
        @endforelse
    </div>
</div>
@endsection
@extends ('layout')
@section ('content')
<div id="wrapper">
    <div id="page" class="container">
        <img src="{{ $user->avatar }}" width="100">
        @can ('editProfile', $user)
        <a href="{{ $user->path('edit') }}" type="button" class="btn reounded-lg py-2 px-2">Edit profile</a>
        @endcan
        <x-follow-button :user="$user"></x-follow-button>

        @foreach($all as $user)
        <ul>
            <a href="{{ $user->path() }}">
            <img src="{{ $user->avatar }}" width="60">
            {{ $user->name }}
            </a>
        </ul>
        @endforeach

        {{ $all->links() }}
    </div>
</div>
@endsection
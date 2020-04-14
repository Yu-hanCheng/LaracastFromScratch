@extends ('layout')
@section ('content')
<div id="wrapper">
    <div id="page" class="container">
    <a href="{{ $user->path('edit') }}" type="button" class="btn reounded-lg py-2 px-2">Edit profile</a>
    <x-follow-button :user="$user"></x-follow-button>
    </div>
</div>
@endsection
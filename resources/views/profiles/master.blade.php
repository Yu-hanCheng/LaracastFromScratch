@extends ('layout')
@section ('content')
<div id="wrapper">
    <div id="page" class="container">
        <form method='post' action='/profiles/{{ $user->name }}/follow'>
            @csrf
            <button type="submit" class="btn btn-primary">{{ auth()->user()->following($user) ? 'Unfollow me' : 'Follow me' }}</button>
        </form>
    </div>
</div>
@endsection
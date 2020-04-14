@unless(current_user()->is($user))
    <form method='post' action='/profiles/{{ $user->name }}/follow'>
        @csrf
        <button type="submit" class="btn btn-primary">{{ current_user()->following($user) ? 'Unfollow me' : 'Follow me' }}</button>
    </form>
@endunless
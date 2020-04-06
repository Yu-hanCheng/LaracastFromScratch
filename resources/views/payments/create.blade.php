@extends ('layouts.app')
@section('content')
<form method="post" action="{{ route('payment.store')}}">
    @csrf
    <input type="submit" value="Submit" />
    @if (session('message'))
    <p class="text-green-500">{{ session('message') }}</p>
    @endif
</form>
@endsection

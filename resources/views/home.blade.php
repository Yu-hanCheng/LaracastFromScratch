@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form method="post" action="{{ route('email.store')}}">
            @csrf
            <input name="email" class="string"/>
            @error('email')
            <div class="text-red-500 text-xs"> {{ $message }}</div>
            @enderror
            <input type="submit" value="Submit"/>
        </form>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

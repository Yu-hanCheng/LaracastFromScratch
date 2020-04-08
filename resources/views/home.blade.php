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
            @if (session('message'))
            <p class="text-green-500">{{ session('message') }}</p>
            @endif
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
                @can('edit_form')
                <li>
                    <a href="#">Edit form</a>
                </li>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div id="root"></div>
    <hr>
    <h2>Following</h2>

    @foreach($following as $user)
        <p><a href="{{ route('users', $user) }}">{{ $user->username }}</a></p>
    @endforeach

    <hr>
    <h2>Followers</h2>

    @foreach($followers as $user)
        <p><a href="{{ route('users', $user) }}">{{ $user->username }}</a></p>
    @endforeach
</div>
@endsection

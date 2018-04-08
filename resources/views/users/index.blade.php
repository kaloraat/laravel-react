@extends('layouts.app')

@section('content')
<div class="container">
    {{ $user->username }}
    <hr>
    @if(Auth::user()->isNotTheUser($user))
        @if(Auth::user()->isFollowing($user))
            <a href="{{ route('users.unfollow', $user) }}">Unfollow</a>
        @else
            <a href="{{ route('users.follow', $user) }}">Follow</a>
        @endif
    @endif

</div>
@endsection

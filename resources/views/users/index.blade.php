@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-primary">{{ $user->username }}</h2>
    <hr>
    @if(Auth::user()->isNotTheUser($user))
        @if(Auth::user()->isFollowing($user))
            <a href="{{ route('users.unfollow', $user) }}" class="btn btn-primary">Unfollow</a>
        @else
            <a href="{{ route('users.follow', $user) }}" class="btn btn-success">Follow</a>
        @endif
    @endif

</div>
@endsection

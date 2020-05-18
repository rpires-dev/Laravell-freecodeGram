@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}" alt="" class=" rounded-circle w-100">
        </div>
        <div class="col-9">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-4">
                    <div class="h4">{{ $user -> username}}</div>
                    <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                </div>
                @can('update',$user->profile)
                <a href="/p/create">add post</a>
                @endcan
            </div>
            @can('update',$user->profile)
            <a href="/profile/{{$user->id}}/edit">edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-3"><strong>posts</strong> {{$postCount}}</div>
                <div class="pr-3"><strong>followers</strong> {{$followersCount}}</div>
                <div class="pr-3"><strong>following</strong> {{$followingCount}}</div>
            </div>
            <div class="pt-4"><strong>{{$user->profile->title}}</strong></div>
            <div>{{$user->profile->description}}</div>
            <div class="pt-2"><a href="">{{$user->profile->url}}</a></div>
        </div>
    </div>

    <div class="row pt-5">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post -> id}}">
                <img src="/storage/{{$post->image}}" alt="" class="w-100">
            </a>
        </div>

        @endforeach

    </div>
</div>
@endsection
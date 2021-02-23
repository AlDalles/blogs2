

@extends('layout1')

@section('title', 'tags')

@section('content')



    <h1 class = "info, info1">pages</h1>
    @if(isset($_SESSION['message']))
        <div class="alert alert-{{$_SESSION['message']['status']}}" role="alert">
            {{$_SESSION['message']['message']}}
        </div>
        @unset($_SESSION['message'])
        @endif
    @foreach($pages as $post)

        <div class="text-white bg-dark info">
            <h1>{{ $post->title }}</h1><a href="/post/{{$post->id}}/edit"  type="submit" >Редактировать</a>
            <a href="/post/{{$post->id}}/delete"  type="submit" >Удалить</a>
        </div>
        <div class="text-info bg-dark info">
            <h3>category: <a href="/post/{{$post->category_id}}/list/cat">{{$post->category->title}}</a></h3>
        </div>
        <div class="text-primary info">
         <p>tags:
                @foreach($post->tags as $tag)
                    <a href="/post/{{$tag->id}}/list/tag">{{$tag->title}}</a>
                @endforeach
        </div>
        </br>
        <p class = "info">{{$post->body}}</p>
        </br>
    @endforeach

    @include('paginator')

@endsection
@extends('layout1')

@section('title', 'Categories')

@section('content')
    <h1>Categories</h1>

    @if(isset($_SESSION['message']))
        <div class="alert alert-{{$_SESSION['message']['status']}}" role="alert">
            {{$_SESSION['message']['message']}}
        </div>
        @unset($_SESSION['message'])
    @endif
    @forelse($pages as $category)
        @if ($loop->first)
          <table  class="table table-striped">
              <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Create at</th>
                  <th scope="col">Updated at</th>
                  <th scope="col">Delete</th>
                  <th scope="col">Update</th>
              </tr>
              </thead>
        @endif

              <tr><td>{{$category->id}}</td><td>{{ $category->title }}
                  </td><td>{{$category->slug}}</td><td>{{$category->created_at}}</td><td>{{$category->updated_at}}</td><td><form action="/category/{{$category->id}}/delete" method="get">
                          <input type="submit" value="удалить"></form></td><td><form action="/category/{{$category->id}}/update" method="get">
                          <input type="submit" value="изменить"></form></td></tr>

        @if ($loop->last)
          </table>
        @endif
    @empty
        <p>no categories</p>
    @endforelse
    @include('paginator')
@endsection
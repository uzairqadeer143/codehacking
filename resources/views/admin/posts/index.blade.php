@extends('layouts.admin')



@section('content')

    <h1>All Posts</h1>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Photo</th>
          <th>User</th>
          <th>Category</th>
          <th>Post Name</th>
          <th>Created</th>
          <th>Updated</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @if($posts)
          @foreach($posts as $post)
            <tr>
              <td>{{$post->id}}</td>
              <td><img width="70" height="70" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/80x80'}}" alt="{{$post->name}}" class="img-responsive img-rounded"></td>
              <td>{{$post->user->name}}</td>
              <td>{{$post->category ? $post->category->name : 'No Category'}}</td>
              <td>{{$post->name}}</td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
              <td><a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-primary">Edit</a></td>
            </tr>

          @endforeach
      @endif
      </tbody>
    </table>





@stop
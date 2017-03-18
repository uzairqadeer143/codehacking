@extends('layouts/admin')


@section('content')

  @if(Session::has('deleted_user'))
    <p class="alert alert-danger">{{session('deleted_user')}}</p>
    @endif

<h1>Users</h1>

    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Photo</th>
          <th>Name</th>
          <th>Email</th>
          <th>Roll</th>
          <th>Status</th>
          <th>Created</th>
          <th>Updated</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @if($users)
        @foreach($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td><img width="70" height="70" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/70x70'}}" alt="{{$user->name}}"></td>
          <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
          <td>{{$user->email}}</td>
          <td><span class="label label-success">{{$user->role->name}}</span></td>
          <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
          <td>{{$user->created_at->diffForHumans()}}</td>
          <td>{{$user->updated_at->diffForHumans()}}</td>
          <td><a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-primary">Edit</a></td>
        </tr>
        @endforeach
      @endif
      </tbody>
    </table>



@stop
@extends('posts.layout')

@section('content')
<div class="pull-left">
<h2>CRUD Activities</h2>
</div>

<div class="row">
<div class="col-lg-12 margin-tb">

<div class="pull-right">
<a class="btn btn-success" href="{{ route('posts.create') }}">Create</a>
</div>
</div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{$message}}</p>
</div>
@endif

<table class="table table-bordered">
<tr>
<th>No</th>
<th>Title</th>
<th>Description</th>
<th width="280px">Action</th>
</tr>
@foreach($posts as $post)
<tr>
<td>{{++$i}}</td>
<td>{{$post->Title}}</td>
<td>{{$post->Description}}</td>
<td>
<form action="{{ route('posts.destroy',$post->id) }}" method = "POST">
<a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
<a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>

@csrf
@method('DELETE')

<button type="submit" class="btn btn-danger">delete</button>
</form>
</td>
@endforeach
</table>
<html>
<head>
<style>
input {
    width:500px;
}
</style>
</head>
<h1>Update</h1><hr>
<form action="/edit"method="POST">
@csrf
<label for="Title"></label>
<input type="hidden" name="id" value="{{$data['id']}}">
<input type="text" name="Title" value="{{$data['Title']}}"><br><br>
<label for="description"></label>
<input type="text" name="Description" value="{{$data['Description']}}"><br><br>
@if ($data->img)
        <img src="{{ asset('/storage/img/'.$data->img) }} ">
        @else
            <h3 style="color:white">No image available<h3>
    @endif
    <br>
    <br>
<button type="submit">update</button>
<a href="../list">back</a>
</form>
</html>

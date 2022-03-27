@extends('base')
@section('content')
<div class="container" style="margin-top: 50px;">

  <h3 class="text-center text-danger"><b>Laravel CRUD With Multiple Image Upload</b> </h3>
  <a href="/create" class="btn btn-success mb-3">Add New Post</a>

 <div class="card border border-2">
   <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Author</th>
          <th>Description</th>
          <th>Cover</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>


          @foreach ($posts as $post)
       <tr>
             <th scope="row">{{ $post->id }}</th>
             <td>{{ $post->title }}</td>
             <td>{{ $post->author }}</td>
             <td>{{ $post->body }}</td>
             <td><img src="cover/{{ $post->cover }}" class="img-responsive" style="max-height:100px; max-width:100px" alt="" srcset=""></td>
             <td><a href="/edit/{{ $post->id }}" class="btn btn-outline-primary">Update</a></td>
             <td>
                 <form action="/delete/{{ $post->id }}" method="post">
                  <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?');" type="submit">Delete</button>
                  @csrf
                  @method('delete')
              </form>
             </td>

         </tr>
         @endforeach

      </tbody>
  </table>
   </div>
 </div>
</div>
@endsection
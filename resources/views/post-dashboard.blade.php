@extends('layout')
   
@section('content')
  <a href="{{ route('post.create') }}" class="btn btn-success mb-2">Add</a> 
  <br>
   <div class="row">
        <div class="col-12">
          
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Title</th>
                 <th>Product Code</th>
                 <th>Description</th>
                 <th>Created at</th>
                 <td colspan="2">Action</td>
              </tr>
           </thead>
           <tbody>
              @foreach($posts as $post)
              <tr>
                 <td>{{ $post->id }}</td>
                 <td>{{ $post->title }}</td>
                 <td>{{ $post->description }}</td>
                 <td>{{ date('Y-m-d', strtotime($post->created_at)) }}</td>
                 <td><a href="{{ route('post.edit', $post->id)}}" class="btn btn-primary">Edit</a></td>
                 <td>
                 <form action="{{ route('post.destroy', $post->id)}}" method="post">
                  {{ csrf_field() }}
                  <!-- {{ method_field('PUT') }} -->
                  @method('POST')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
      
       </div> 
   </div>
 @endsection  
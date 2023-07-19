<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <div class="heading text-center">
       <h5>Post List</h5>
    </div>  
    <a href="{{route('add_post')}}" class="btn btn-primary">Add Post</a>
    <a href="{{route('home')}}" class="btn btn-primary">Home</a>
    <table class="table">
  <thead>
    <tr>
    <th>#</th>
      <th>Title</th>
      <th>Description</th>
      <th>Comment</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach($posts as $key=>$post)
    <tr>
      <th>{{++$key}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td>
        <ul>
            @if(count($post->comments)>0)
            @foreach($post->comments as $comment)
            <li>{{$comment->content}}</li>
            @endforeach
            @else
            <p class="text-danger">This post has no comments</p>
            @endif
        </ul>   
      </td>
      <td>
        <form action="{{route('add_post_comment')}}" method="post">
            @csrf
            <input name="id" type="hidden" value="{{$post->id}}">
            <button class="btn btn-primary">Comment</button>
        </form>    
      </td>  

    </tr>
    @endforeach
    </tr>
  </tbody>
</table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
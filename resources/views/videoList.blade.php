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
       <h5>Video List</h5>
    </div>  
    <a href="{{route('add_video')}}" class="btn btn-primary">Add Video</a>
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
    @foreach($videos as $key=>$video)
    <tr>
      <th>{{++$key}}</th>
      <th>{{$video->title}}</td>
      <td>{{$video->description}}</td>
      <td>
        <ul>
            @if(count($video->comments)>0)
            @foreach($video->comments as $comment)
            <li>{{$comment->content}}</li>
            @endforeach
            @else
            <p class="text-danger">This video has no comments</p>
            @endif
        </ul>   
      </td>
      <td>
        <form action="{{route('add_video_comment')}}" method="post">
            @csrf
            <input name="id" type="hidden" value="{{$video->id}}">
            <button class="btn btn-primary">Comment</button>
        </form>    
      </td>  
    </tr>
    @endforeach
  </tbody>
</table>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
@extends('../layouts.app')

@section('content')
<style>

.detailBox {
    
    border:1px solid #bbb;
    margin:50px;
}
.titleBox {
    background-color:#fdfdfd;
    padding:10px;
}
.titleBox label{
  color:#444;
  margin:0;
  display:inline-block;
}

.commentBox {
    padding:10px;
    border-top:1px dotted #bbb;
}
.commentBox .form-group:first-child, .actionBox .form-group:first-child {
    width:80%;
}
.commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
    width:18%;
}
.actionBox .form-group * {
    width:100%;
}
.taskDescription {
    margin-top:10px 0;
}
.commentList {
    padding:0;
    list-style:none;
    max-height:200px;
    overflow:auto;
}
.commentList li {
    margin:0;
    margin-top:10px;
}
.commentList li > div {
    display:table-cell;
}
.commenterImage {
    width:30px;
    margin-right:5px;
    height:100%;
    float:left;
}
.commenterImage img {
    width:100%;
    border-radius:50%;
}
.commentText p {
    margin:0;
}
.sub-text {
    color:#aaa;
    font-family:verdana;
    font-size:11px;
}
.actionBox {
    border-top:1px dotted #bbb;
    padding:10px;
}
.circle{
    text-align: center;
    padding:8px;
    border-radius: 100%;
    background: indianred;
}
</style>

<section class="container">
    
    <div>
       <img src="{{asset($data->image)}}"  class="w-100" style="height: 50vh">
       <h2>{{$data->title}}</h2>
       <div>
        <span>Published By: {{$data->user_id}}</span> <br>
        <span>Published date: {{$data->created_at}}</span>
       </div>
       <div class="conrainer">
        <p>
            {!! $data->description !!}
        </p>
       </div>
    </div>
</section>
<section class="comments container row">
    <div class="detailBox col-sm-8 mx-auto">
    <div class="titleBox">
      <label>Comment Box</label>
    </div>
    <div class="commentBox">
        
        <p class="taskDescription">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        @if(Session::get('status'))
         
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong>Success!</strong> {!! Session::get('status') !!}
        </div>
        @endif
    </div>
    <div class="actionBox">
        <ul class="commentList">
            @foreach($data->comments as $comment)
            <li class="">
                <div class="px-4" title="{{$comment->hasusers->name}}">
                  <span class="circle" id="circle">{{ucfirst($comment->hasusers->name[0])}}</span> 
                </div>
              
                <div class="commentText mx-4">
                    <p class="">{{$comment->comment}}</p> <span class="date sub-text">{{$comment->created_at}}</span>

                </div>
            </li>
            @endforeach
            
        </ul>
        <form class="justify-content-space-between" action="/comment-submit" method="POST">
            @csrf
            <div class="form-group w-100">
                <input type="hidden" name="blog_id" value="{{$data->id}}">
                <textarea class="form-control w-100" name="comment" type="text" placeholder="Your comments"> </textarea>
            </div> 
            <div class="form-group mt-2 float-end">
                <button class="btn btn-success">Add</button>
            </div>
        </form>
    </div>
</div>

</section>

@endsection

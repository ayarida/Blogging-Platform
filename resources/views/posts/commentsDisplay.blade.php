@inject ("Comment","App\Models\Comment")
<style>
    @import url(https://fonts.googleapis.com/css?family=Lato:300,400);
    @import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
    ul{
        display: inline-table;
        list-style: none;
        margin: 0px 25px 0px 25px;
    }
    li{
        font-size: 13px;
        display: inline;
        color:grey;
    }
    i{
        color:grey;
        font-size: 10px;
    }
    .comment_details {
		display: inline-block;
		vertical-align: middle;
		width: 70%;
		text-align: left;
	}
</style>
<div class="comments-div" style="align:center">
@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <?php 
            $temp=explode(' ',$comment->created_at);
        ?>
        <p>{{ $comment->body }}</p>
        <div class="comment_details">
        <ul>
            <li><i class="fa fa-clock-o"></i>{{$temp[1]}}</li>
            <li><i class="fa fa-calendar"></i>{{$temp[0]}}</li>
            <li><i class="fa fa-pencil"></i> <span class="user">{{$comment->user->name}}</span></li>
        </ul>
        </div>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('StoreComment') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="body" style="border:solid 2px grey; border-radius:10px" placeholder="Reply"  class="form-control" width="20px"/>
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                {{-- <input type="submit" class="btn btn-warning" value="Reply" /> --}}
                <button type="submit"><i class="fa fa-reply"></i></button>
            </div>
        </form>
        @include('posts.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach
</div>
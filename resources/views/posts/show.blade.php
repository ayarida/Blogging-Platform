@section('header')
<head>
     {{-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
       
      
</head>
<style>
   
.like-btn{
  
  border-radius: 3px;

  padding: 7px 3px 3px 7px;
  margin-right: 5px;
  margin-top: -5px;
}
.like-post{
  color: #5dadec !important;
}

.panel i.fa-thumbs-up { 
  display: inline; 
  font-size: 1.125em; 
  cursor: pointer; 
  padding-right: 7px;
}


</style>  
@endsection


<x-app-layout>
    <x-slot name="header">
       
    </x-slot>  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container">
                <div class="row justify-content-center">
                    <div>
                        <div >
                            <div>
                                
                                <br/>
                                <div class="img-container">
                                    <img  src="{{asset('images/').'/'.$post->image}}" width="400px" height="400px"/>
                                </div>
                                
                                <p class="h1">{{ $post->title }}</p>
                                <p>
                                    {{ $post->text }}
                                </p>
                                <div class="panel" data-id="{{ $post->id }}">
                                    <span class="like-btn">
                                        <i id="like{{$post->id}}" class="fa fa-thumbs-up {{ auth()->user()->LikedPost($post) ? 'like-post' : '' }}"></i>
                                        <div id="like{{$post->id}}-bs3">
                                            {{ $post->NbOfLikes() }}
                                        </div>
                                    </span>
                                </div>
                                <form method="post" action="{{ route('StoreComment') }}">
                                    @csrf
                                    <div class="form-group">
                                        <textarea placeholder="Type a comment" class="form-control" name="body" style="border:solid 2px black;"></textarea>
                                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Add Comment" />
                                    </div>
                                </form>
                              
                                <h4>Comments</h4>
              
                                @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('i.fa-thumbs-up').click(function(){
            var id = $(this).parents(".panel").data('id'); //post id 
            var c = $('#'+this.id+'-bs3').html(); // #likepostId-bs3
            var cObjId = this.id; // likepostId
            var cObj = $(this); // all the tag
            $.ajax({
                type:'POST',
                url:'/post/Addlike',
                data:{post_id:id},
                success:function(data){
                    if(data.success == 'Dislike'){
                        $('#'+cObjId+'-bs3').html(parseInt(c)-1 );
                        $(cObj).removeClass("like-post");
                    }else{
                        $('#'+cObjId+'-bs3').html(parseInt(c)+1);
                        $(cObj).addClass("like-post");
                    }
                }
            });
        });
        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    });
</script>



@extends('dashboard')
@section('content')        
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="text-center text-success">This is your post</h1>
                                <br/>
                                <div >
                                    <img style="text-align: center;"  src="{{ asset('images/Post.jpg') }}" />
                                </div>
                                
                                <p class="h1">{{ $post->title }}</p>
                                <p>
                                    {{ $post->text }}
                                </p>
                                <hr />
                                <h4>Comments</h4>
              
                                @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

                              
                                <form method="post" action="{{ route('StoreComment') }}">
                                    @csrf
                                    <div class="form-group">
                                        <textarea placeholder="Type a comment" class="form-control" name="body" style="border:solid 2px black;"></textarea>
                                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" value="Add Comment" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
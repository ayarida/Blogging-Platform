@section('header')

<style>
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
  height: 600px;
  overflow-y: auto;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
    height: 500px;
    overflow-y: auto;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
.PostActions{
  display:flex;
}
.dropbtn {
  background-color: white;
  color: black;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  float: right;
  margin-right:30px;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 7px 9px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #4780c2;}
</style>
@endsection

@extends('dashboard')
@section('content')
              
               <div class="row"> 
                    @foreach ($posts as $post)                    
                    <div>
                      <div class="column">
                        <div class="card">
                          <a href="{{route('ShowPostDetails',$post->id)}}">
                          
                          <img src="{{asset('images').'/'.$post->user_id.'jpeg'}}" style="width:100%">
                          </a>
                          <div class="container">
                            <div>
                              <h2>{{$post->title}}</h2>
                              @if($post->user_id == $userId)
                              <div class="dropdown">
                                <button class="dropbtn">...</button>
                                
                                <div class="dropdown-content">
                                  <a href="{{route('PostGetUpdate',$post->id)}}">Edit</a>
                                  
                                  <form action="{{route('PostDelete',$post->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a ><button class="btn btn-danger" type="submit">Delete</button></a>
                                  </form>
                                </div>
                              </div>
                              @endif
                            </div>
                            <p class="title">{{$post->text}}</p>
                           
                            <p>example@example.com</p>
                            <div class="PostActions">
                            {{-- <a href="#">
                              <img src="https://img.icons8.com/pastel-glyph/64/000000/facebook-like.png" height="30px" width="30px"/>
                            </a>
                            <a href="#">
                              <img src="https://img.icons8.com/metro/26/000000/comments.png" height="25px" width="25px"/>
                            </a> --}}
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    @endforeach
                
                </div>
                <div class="d-flex justify-content-center" style="align:center">
                  {!! $posts->links() !!}
                </div>
            </div>
 @endsection

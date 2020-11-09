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
  min-width: 140px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 2px 5px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #889996;}

.theiaStickySidebar:after {
    content: "";
    display: table;
    clear: both;
}
.index-post {
    margin: 0 0 15px;
    box-sizing: border-box;
    background-color: #fff;
    padding: 15px;
    border: 1px solid #ebebeb;
    box-shadow: 0 0 5px 0 rgba(0,0,0,0.03);
}
#main-wrapper {
    float: left;
    overflow: hidden;
    width: 1176px;
    box-sizing: border-box;
    padding: 0 20px;
}
.main .widget {
    position: relative;
}
.section, .widget, .widget ul {
    margin: 0;
    padding: 0;
}
.post-meta {
    display: block;
    overflow: hidden;
    color:#5D5C61;
    font-size: 12px;
    font-weight: 400;
    line-height: 18px;
    padding: 0 1px;
}
h2 {
    display: block;
    font-size: 1.5em;
    margin-block-start: 0.83em;
    margin-block-end: 0.83em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}
strike, strong, sub, sup, table, tbody, td, tfoot, th, thead, tr, tt, u, ul, var {
    padding: 0;
    border: 0;
    outline: 0;
    vertical-align: baseline;
    background: 0 0;
    text-decoration: none;
}
h6, html, i,img,strike{
    padding: 0;
    border: 0;
    outline: 0;
    vertical-align: baseline;
    background: 0 0;
    text-decoration: none;
}
a,body,form, h1, h2, h3, h4, h5, h6,img,strike,table, tbody{
    padding: 0;
    border: 0;
    outline: 0;
    vertical-align: baseline;
    background: 0 0;
    text-decoration: none;
}
div {
    display: block;
}
body {
    background-color: #f8f9fa;
    font-family: 'Open Sans',serif;
    font-size: 12px;
    font-weight: 400;
    background-color: #7395AE;
    color: black;
    word-wrap: break-word;
    margin: 0;
    padding: 0;
}
.index-post .post-image-wrap {
    float: left;
    width: 240px;
    height: 150px;
    margin: 0 20px 0 0;
}
.post-image-wrap {
    position: relative;
    display: block;
}
.blog-post {
    display: block;
    overflow: hidden;
    word-wrap: break-word;
}

.SharePost{
  font-size: 17px;
}

.CreateLink{
  color:blue;
}
</style>
@endsection

@extends('dashboard')
@section('content')
            
            <br>
              <div id="main-wrapper" style="position: relative; overflow:visible; box-sizing:border-box;min-height:1px">
                <div class="theiaStickySidebar" style="padding-top:0px; padding-bottom:1px; position:static; transform:none;" >
                  <div class="main section" id="main" name="Main Posts">
                    <div class="widget Blog" data-version="2" id="Blog1">
                      <div class="blog-posts hfeed index-post-wrap">
                        <div class="SharePost">
                        <span>Share yours?  </span><a class="CreateLink" href="{{route('PostGetCreate')}}" >Create Post</a>
                        </div>
                        <br>
                        <hr />
                        <div class="row"> 
                          @foreach ($posts as $post)   
                            <div class="blog-post hentry index-post">
                              <div class="post-image-wrap">
                                <a href="{{route('ShowPostDetails',$post->id)}}">
                                <img src="{{asset('images/').'/'.$post->image}}" height="140px" width="180px" style="border: 1px solid black"/>
                                </a>
                              </div>
                              <div class="post-info">
                                <div>
                                <h2 class="post-title">
                                  {{$post->title}}
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
                                </h2>
                                
                              </div>
                                <div class="post-meta">
                                  {{-- <span class="post-author">
                                    {{$post->text}}
                                  </span> --}}
                                  <div style="display:block">
                                  <img @if ($post->public=='1')src="{{asset('images/public.png')}}" height="13px" width="13px" @endif/>
                                  <img @if ($post->public=='0')src="{{asset('images/private.png')}}" height="15px" width="15px" @endif/>
                                  <span class="post-date published" datetime="2016-08-23T15:00:00-07:00">
                                    Published at {{$post->created_at}}

                                  </span>
                                </div>
                                </div>
                                <p class="post-snippet">
                                  {{$post->text}}
                                </p>
                              </div>
                             
                                <a href="{{route('ShowPostDetails',$post->id)}}" style="padding-top:10px; float:right"><p style="color:#557A95"> >>View Post</p></a>
                              
                            </div> 
                          
                          @endforeach
                      
                      </div>
                      <div class="d-flex justify-content-center" style="align:center">
                        {!! $posts->links() !!}
                      </div>
                  </div>
          </div>
          </div>
          </div>
          </div>
          </div>
 @endsection

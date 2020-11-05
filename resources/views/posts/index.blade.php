<head>
    <style>
    * {
        box-sizing: border-box;
      }
      
      .column {
        float: left;
        width: 33.33%;
        padding: 5px;
        height: 500px;
        overflow-y: auto;
      }
      
      /* Clearfix (clear floats) */
      .row::after {
        content: "";
        clear: both;
        display: table;
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
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <div class="row"> 
                    @foreach ($posts as $post)                    
                            <div class="column">
                                <span>{{$post->title}}</span>
                                <div class="dropdown">
                                    <button class="dropbtn">...</button>
                                    <div class="dropdown-content">
                                      <a href="{{route('PostGetUpdate',$post->id)}}">Edit</a>
                                      <form action="{{route('PostDelete',$post->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a><button class="btn btn-danger" type="submit">Delete</button></a>
                                    </form>
                                      
                                    </div>
                                  </div>
                                <img src="{{ asset('images/1.png') }}" height="250px" width="250px" />
                                <h5>{{$post->text}}</h5>
                                <!--adding the comment and likes field -->
                                <div class="PostActions">
                                    <img src="{{ asset('images/like.jpg') }}" height="10px" width="30px">
                                    <img src="{{ asset('images/commentIcon.png') }}" height="10px" width="25px">
                                </div>
                            </div> 
                  @endforeach
                </div>
            </div>
                
        </div>
    </div>
</x-app-layout> 

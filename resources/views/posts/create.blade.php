@section('header')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@endsection 
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container mt-4">
                
                <div class="card">
                    <div class="card-header text-center font-weight-bold">
                    Add Blog Post:
                    </div>
                    <div class="card-body">
                    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{route('PostStore')}}">
                    @csrf
                        <div class="form-group">
                        <label for="exampleInputEmail1">Text</label>
                        <textarea type="text" id="title" name="post-text" class="form-control" required="" placeholder="Enter your text here.." width="50px" height="80px"></textarea>
                        </div>
                        <div class="form-group">
                            
                            <label for="public">Public</label>
                            <input type="radio" id="public" name="public" value="public">

                            <label for="private">Private</label>
                            <input type="radio" id="private" name="public" value="private">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <div class="col-sm-12">  
                        @if(session()->get('success'))    
                        <div class="alert alert-success">     
                            {{ session()->get('success') }}     
                            </div>  
                        @endif
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

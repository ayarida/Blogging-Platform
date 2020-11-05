<table class="table table-striped">
    <thead>
        <tr>
            <td>Post</td>
            <td>Name</td>
            <td>Email</td>
            <td>City</td>
            <td colspan=2>Actions</td>
        </tr>
    </thead>
    <button><a href="{{route('PostGetGreate')}}">Create Post</a></button>
    <tbody>
       
        @foreach($customers as $customer)
        <tr>
        <td>{{$customer->id}}</td>
        <td>{{$customer->first_name}} {{$customer->last_name}}</td>
        <td>{{$customer->email}}</td>
        <td>{{$customer->city}}</td>
        <td><a href="{{route('getupdate', $customer->id)}}" class="btn btn-primary">Edit</a></td>
        <td>
            <form action="{{route('postdelete',$customer->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>

            </form>
        </td>
        </tr>
        @endforeach
    </tbody>

</table>
<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="font-size: 20px"> --}}
            {{-- <div style="display:inline-block">
            <img src="{{asset('images/logo.png')}}" height="40px" width="40px"/>
            {{ __('BLOG PLATFORM') }}
            </div> --}}
        {{-- </h2> --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <!-- The Main Page will shows the Public posts with the email of the user posted it, 
            once the user logged in it will shows its own posts -->
               
        </div>
        <div>
        <img src="{{asset('images/welcome.png')}}" height="500px" width="500px" style="float:left;padding: 10px;"/> 
       
        <h1 style="font-size:60px;padding-top:160px;font-style:Arial" >BLOGGING PLATFORM</h1>
        ----------------------------------------------------------------------------------------------
        <p>Feel free to share your posts and leave your feedback..</p>
        {{-- <h1 style="font-size:60px;padding-top:70px" >PLATFORM</h1> --}}
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="font-size: 20px">
            {{ __('BLOG PLATFORM') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <!-- The Main Page will shows the Public posts with the email of the user posted it, 
            once the user logged in it will shows its own posts -->
                @yield('content')
        </div>
    </div>
</x-app-layout>

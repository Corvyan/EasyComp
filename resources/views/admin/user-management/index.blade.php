@extends('layouts.app')

@section('page-content')
<section class="py-20 px-60 min-h-screen flex items-center">
    <div class="sm:px-6 w-full">

        @if(session()->has('success'))
            <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-3 mb-4" role="alert">
                <p class="font-bold">{{ session('success') }}</p>
                <p class="text-sm pt-2">Added new User</p>
            </div>
        @endif

        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <div class="sm:flex items-center justify-between">
                <div class="flex items-center">
                    <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">User Management</p>
                </div>
                <a href="{{ route('user-management.create') }}" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                    <p class="text-sm font-medium leading-none text-white">Add New User</p>
                </a>
            </div>
            <div class="mt-7 overflow-x-auto">
                @if ($users->count())
                <table class="w-full whitespace-nowrap">
                    <tbody>

                        {{-- TABLE ROW START --}}
                        
                        @foreach ($users as $user)
                        @if ($user->role_id == 2)
                            <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                                <td>
                                    <div class="flex items-center pl-5">
                                        <p class="text-lg font-medium leading-none text-gray-700 mr-40">{{ $user->name }}</p>
                                    </div>
                                </td>

                                <td>
                                    <div class="flex items-center pl-5">
                                        <p class="text-sm font-small leading-none text-gray-700 mr-40">{{ $user->year_start }}</p>
                                    </div>
                                </td>
                                
                                <td>
                                    <div class="flex items-center pl-5">
                                        <p class="text-sm font-small leading-none text-gray-700 mr-40">{{ $user->university }}</p>
                                    </div>
                                </td>

                                <td>
                                    <a href="{{ route('user-management.show', $user) }}" class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">View</a>
                                </td>
                                <td>
                                    <a href="{{ route('user-management.edit', $user->id) }}" class="focus:ring-2 focus:ring-offset-2 focus:ring-blue-300 text-sm leading-none text-blue-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('user-management.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-red-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">Delete</button>
                                    </form>    
                                </td>
                            </tr>
                            <tr class="h-3"></tr>
                        @endif
                        @endforeach
                        

                        {{-- TABLE ROW END --}}


                        
                    </tbody>
                </table>
                @else
                    <h4 class="text-lg text-center text-gray-900 mb-6 mt-14">There are no users yet.</h4>
                @endif

               
            </div>
        </div>

        

    </div>



<script src="./index.js"></script>
<style>.checkbox:checked + .check-icon {
    display: flex;
    }
</style>
<script>function dropdownFunction(element) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        let list = element.parentElement.parentElement.getElementsByClassName("dropdown-content")[0];
        list.classList.add("target");
        for (i = 0; i < dropdowns.length; i++) {
            if (!dropdowns[i].classList.contains("target")) {
                dropdowns[i].classList.add("hidden");
            }
        }
        list.classList.toggle("hidden");
    }</script>
                

</section>

@endsection
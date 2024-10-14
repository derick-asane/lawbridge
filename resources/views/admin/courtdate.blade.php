
@extends('adminLayout')

@section('adminContent')

@if (session('create-success'))
    <div id="alert" class="absolute top-0 left-1/2 transform -translate-x-1/2 bg-green-500 text-white p-4 rounded mb-4 transition-transform duration-500 ease-in-out translate-y-[-100%]">
        {{ session('create-success') }}
    </div>
@endif

@if (session('edit-success'))
    <div id="alert" class="absolute top-0 left-1/2 transform -translate-x-1/2 bg-green-500 text-white p-4 rounded mb-4 transition-transform duration-500 ease-in-out translate-y-[-100%]">
        {{ session('edit-success') }}
    </div>
@endif

<div class="w-full flex justify-center text-[20px] sm:text-[40px] bold">
    <span class="">court dates </span>
</div>
<hr>
<div class="flex justify-end">
    <a href=" {{ route('admin.courtdateForm')}}" class="bg-green-300 border rounded-md py-1 px-2 mr-5 my-4 text-white text-[20px] italic">New courtDate</a>
</div>

<!-- Court date table -->
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-center">ID</th>
                <th class="py-3 px-6 text-center">UserName</th>
                <th class="py-3 px-6 text-center">Court</th>
                <th class="py-3 px-6 text-center">Location</th>
                <th class="py-3 px-6 text-center">DateTime</th>

                <th class="py-3 px-6">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach($courtdates as $courtdate)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">{{ $courtdate->id }}</td>
                    <td class="py-3 px-6 text-center">{{ $courtdate->user->username }}</td>
                    <td class="py-3 px-6 text-center">{{ $courtdate->court->name }}</td>
                    <td class="py-3 px-6 text-center">{{ $courtdate->court->location }} </td>
                    <td class="py-3 px-6 text-center">{{ $courtdate->datetime }} </td>
                    <td class="py-3 px-3 flex justify-center">
                        <a href=" {{ route('courtdateeditForm', ['id' => $courtdate->id])}}" class="bg-green-400 text-white hover:bg-green-800 py-1 px-4 rounded">Edit</a>
                        <form action="" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-400  text-white hover:bg-red-700 ml-2 py-1 px-2 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection

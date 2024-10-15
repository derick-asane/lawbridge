
@extends('Layout')

@section('content')

<div class="w-full flex justify-center text-[20px] sm:text-[40px] bold">
    <span class="">My court dates </span>
</div>
<hr>

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

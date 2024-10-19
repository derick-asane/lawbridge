
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
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection

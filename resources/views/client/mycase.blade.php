@extends('Layout')


@section('content')
    <div class="w-full flex justify-center text-[40px] bold">
        <span>MyCase, {{Auth::User()->username}} </span>
    </div>
    <hr>
    <div class="flex justify-end">
        <a href=" {{ route('caseForm')}}" class="bg-green-300 border rounded-md py-1 px-2 mr-5 my-4 text-white text-[20px] italic">New case</a>
    </div>

    <!-- Court date table -->
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-center">ID</th>
                <th class="py-3 px-6 text-center">Subject</th>
                <th class="py-3 px-6 text-center">Type</th>
                <th class="py-3 px-6 text-center">Description</th>
                <th class="py-3 px-6 text-center">Status</th>

                <th class="py-3 px-6">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach($mycases as $mycase)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">{{ $mycase->id }}</td>
                    <td class="py-3 px-6 text-center">{{ $mycase->subject  }}</td>
                    <td class="py-3 px-6 text-center">{{ $mycase->type  }}</td>
                    <td class="py-3 px-6 text-center">{{ $mycase->description  }} </td>
                    <td class="py-3 px-6 text-center uppercase">{{ $mycase->status  }} </td>
                    <td class="py-3 px-3 flex justify-center">
                        <a href="{{ route('show.case', ['mycase' => $mycase])}}" class="bg-green-400 text-white hover:bg-green-800 py-1 px-4 rounded">View</a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

   
@endsection
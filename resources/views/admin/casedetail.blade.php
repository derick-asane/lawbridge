@extends('adminLayout')


@section('adminContent')
    <div class="w-full flex justify-center text-green-500 text-[40px] bold gap-6">
        <span> id: {{ $mycase->id}}</span>
        <span>Subject:{{$mycase->subject}}</span>
    </div>
    <hr>
        <div class="flex justify-center my-4 border-4">
            <span class="underline">PDF documents</span>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">ID</th>
                        <th class="py-3 px-6 text-center">Subject</th>
                        <th class="py-3 px-6">Click link</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($files as $file)
                        @if ($file->file_type === 'pdf')  
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-center">{{ $file->id }}</td>
                                <td class="py-3 px-6 text-center">{{ $file->file_name }}</td>
                                <td class="py-3 px-3 flex justify-center">
                                    <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank">{{ $file->file_path }}</a>    
                                </td>
                            </tr>
                        @endif     
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="flex justify-center my-4 border-4">
            <span class="underline">Image Files</span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mx-auto my-2 ">
            @foreach ($files as $file)
                @if ($file->file_type === 'image')
                    <div class="bg-gray-50 shadow-md rounded-lg px-1 py-4">
                        <div class="h-64 mb-4">
                            <img src="{{ asset('storage/'.$file->file_path) }}" alt="{{ $file->file_name }}" class="object-cover w-full h-full rounded-lg">
                        </div>
                        <div class="flex justify-center border-t-2">
                            <span>{{ $file->file_name }}</span>
                        </div>
                    </div>    
                @endif      
            @endforeach
        </div>
        
    </div>
   
@endsection

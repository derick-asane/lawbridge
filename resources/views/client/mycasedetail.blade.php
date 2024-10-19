@extends('Layout')


@section('content')
    <div class="w-full flex justify-center text-green-500 text-[40px] bold gap-6">
        <span> Case_id: {{ $mycase->id}}</span>
        <span>Subject:{{$mycase->subject}}</span>
    </div>
    <hr>
    <div class="flex flex-col justify-center">
        <div class="flex justify-center text-white ">
            <span class="bg-green-500 border rounded-md py-1 px-2 my-4">Add attachment</span>
        </div>
        
        <div class="flex justify-center">
            <a href=" {{ route('client.pdfForm', ['mycase' => $mycase])}}" class="bg-gray-400 border rounded-md py-1 px-4 mr-5 my-4 text-white text-[20px] italic">pdf</a>
            <a href="#" class="bg-gray-400 border rounded-md py-1 px-2 mr-5 my-4 text-white text-[20px] italic">video</a>
            <a href="#" class="bg-gray-400 border rounded-md py-1 px-2 mr-5 my-4 text-white text-[20px] italic">audio</a>
            <a href="{{ route('client.imageForm', ['mycase' => $mycase])}}" class="bg-gray-400 border rounded-md py-1 px-2 mr-5 my-4 text-white text-[20px] italic">image</a>
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
                        <th class="py-3 px-6">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($files as $file)
                        @if ($file->file_type === 'pdf')  
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-center">{{ $file->id }}</td>
                                <td class="py-3 px-6 text-center">{{ $file->file_name }}</td>
                                <td class="py-3 px-3 text-center">
                                    <a href="{{ asset('storage/' . $file->file_path) }}" target="_blank">{{ $file->file_path }}</a>    
                                </td>
                                <td class="py-3 px-3 text-center">
                                    <a href="#" class="bg-green-400 text-white hover:bg-green-800 py-1 px-4 rounded">Edit</a>
                                    <form action="" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-400  text-white hover:bg-red-700 ml-2 py-1 px-2 rounded">Delete</button>
                                    </form>
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

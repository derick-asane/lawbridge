@extends('Layout')


@section('content')
    <div class="w-full flex justify-center text-green-500 text-[40px] bold gap-6">
        <span> id: {{ $mycase->id}}</span>
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
            <a href="#" class="bg-gray-400 border rounded-md py-1 px-2 mr-5 my-4 text-white text-[20px] italic">image</a>
        </div>
        <hr>

    </div>
   
@endsection

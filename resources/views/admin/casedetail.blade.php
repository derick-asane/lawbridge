@extends('adminLayout')


@section('adminContent')

    
    @if (session('success'))
    <div id="alert" class="absolute top-0 left-1/2 transform -translate-x-1/2 bg-green-500 text-white p-4 rounded mb-4 transition-transform duration-500 ease-in-out translate-y-[-100%]">
        {{ session('success') }}
    </div>
    @endif
    <div class="w-full flex justify-center text-green-500 text-[40px] bold gap-6">
        <span class="text-blue-200"> Case_id: {{ $mycase->id}} |</span>
        <span> Subject:{{$mycase->subject}}</span>
        <div class="text-blue-200">
            
            <form action=" {{ route('update.casestatus', ['id' =>  $mycase->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <span> | Status:</span>
                <select name="status" id="status" class="text-[20px]">
                    <option value="pending" {{ $mycase->status == 'pending' ? 'selected' : '' }}>PENDING</option>
                    <option value="accepted" {{ $mycase->status == 'accepted' ? 'selected' : '' }}>ACCEPTED</option>
                    <option value="cancelled" {{ $mycase->status == 'cancelled' ? 'selected' : '' }}>CANCELLED</option>
                    <option value="concluded" {{ $mycase->status == 'concluded' ? 'selected' : '' }}>CONCLUDED</option>
                </select>

            </form>        
        </div>
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
                            <tr class="border-b border-gray-200 hover:bg-gray-100 text-blue-400">
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
                            <span class="text-blue-500">{{ $file->file_name }}</span>
                        </div>
                    </div>    
                @endif      
            @endforeach
        </div>
        
    </div>

    <script>

        document.getElementById('status').addEventListener('change', function() {
            this.form.submit();
        });

        
    </script>

<script>
    // Display the alert with animation
    const alert = document.getElementById('alert');
    if (alert) {
        alert.classList.remove('translate-y-[-100%]'); // Remove the initial translate class
        alert.classList.add('translate-y-0'); // Bring it to the normal position

        // Set a timeout to hide the alert after 3 seconds with animation
        setTimeout(function() {
            alert.classList.add('translate-y-[-100%]'); // Move it up
            // Optionally, hide the element completely after the animation
            setTimeout(() => {
                alert.style.display = 'none'; // Hide the alert completely after animation is done
            }, 500); // Match this with the duration of the transition
        }, 3000); // 3000 milliseconds = 3 seconds
    }
</script>
   
@endsection

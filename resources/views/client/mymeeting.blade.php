
@extends('Layout')

@section('content')

@if (session('success'))
    <div id="alert" class="absolute top-0 left-1/2 transform -translate-x-1/2 bg-green-500 text-white p-4 rounded mb-4 transition-transform duration-500 ease-in-out translate-y-[-100%]">
        {{ session('success') }}
    </div>
@endif

<div class="w-full flex justify-center text-[20px] sm:text-[40px] bold">
    <span class="">Scheduled Consultation </span>
</div>
<hr>


<!-- Products table -->
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-center">ID</th>
                <th class="py-3 px-6 text-center">Meeting_Id</th>
                <th class="py-3 px-6 text-center">UserName</th>
                <th class="py-3 px-6 text-center">Schedule Date</th>
                <th class="py-3 px-6">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach($meetings as $meeting)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center">{{ $meeting->id }}</td>
                    <td class="py-3 px-6 text-center">{{ $meeting->meeting_id }}</td>
                    <td class="py-3 px-6 text-center">{{ $meeting->client->username }}</td>
                    <td class="py-3 px-6 text-center">{{ $meeting->scheduled_at }}</td>
                    
                    <td class="py-3 px-3 flex justify-center">
                        <a href="{{route('client.joinmeeting', ['meetingId' => $meeting->meeting_id] )}}" class="bg-blue-400 text-white hover:bg-blue-800 py-1 px-4 rounded">Join</a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

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


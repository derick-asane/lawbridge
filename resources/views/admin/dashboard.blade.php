
@extends('adminLayout')

@section('adminContent')


<div class="w-full flex justify-center text-[20px] sm:text-[40px] bold">
    <span class="">Welcome, {{Auth::User()->username}} </span>
</div>

<div class="container mx-auto p-4">
    <div class="flex flex-wrap -mx-4">
        <div class="w-full md:w-1/2 xl:w-1/3 p-4">
            <div class="bg-green-200 rounded shadow-md p-4 relative">
                <img src="{{ asset('svg/court-folder.svg') }}" alt="" class="absolute top-0 right-0 w-6 h-6 mr-2 mt-2">
                <h2 class="text-lg font-bold mb-2">Number of Cases</h2>
                <p class="text-white text-3xl">{{ $totalCases}}</p>
            </div>
        </div>
        
        <div class="w-full md:w-1/2 xl:w-1/3 p-4">
            <div class="bg-blue-200 rounded shadow-md p-4 relative">
                <img src="{{ asset('svg/court-stamp.svg') }}" alt="" class="absolute top-0 right-0 w-6 h-6 mr-2 mt-2">
                <h2 class="text-lg font-bold mb-2">Number of Courtdates</h2>
                <p class="text-white text-3xl">{{ $totalCourtdates }}</p>
            </div>
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-4">
            <div class="bg-yellow-200 rounded shadow-md p-4 relative">
                <img src="{{ asset('svg/video-conference.svg') }}" alt="" class="absolute top-0 right-0 w-6 h-6 mr-2 mt-2">
                <h2 class="text-lg font-bold mb-2">Number of Consultations</h2>
                <p class="text-white text-2xl">{{ $totalMeetings }}</p>
            </div>
        </div>
        
    </div>
</div>

<div class="flex w-full space-x-4">
    <div class="w-1/2">
        <canvas id="myChart" class="w-full"></canvas>
    </div>
    <div class="w-1/2">
        <canvas id="pieChart" class="w-full"></canvas>
    </div>
</div>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', // Can be 'line', 'pie', etc.
        data: {
            labels: {!! json_encode($labels) !!}, // Example: ['January', 'February', 'March', 'April']
            datasets: [{
                label: 'Data',
                data: {!! json_encode($data) !!}, // Example: [65, 59, 80, 81]
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    var ctx = document.getElementById('pieChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line', // Can be 'line', 'pie', etc.
        data: {
            labels: {!! json_encode($labels) !!}, // Example: ['January', 'February', 'March', 'April']
            datasets: [{
                label: 'Data',
                data: {!! json_encode($data) !!}, // Example: [65, 59, 80, 81]
                backgroundColor: 'rgba(54, 162, 235, 1)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

@endsection

    
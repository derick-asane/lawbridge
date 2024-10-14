
@extends('Layout')

@section('content')

<section class="bg-gray-100 p-6 md:flex items-center">
    <div class="md:w-1/2 md:pr-8">
        <img src="{{ asset('images/law2.png') }}" alt="Fashion Image" class="w-full rounded-lg">
    </div>

    <div class="md:w-1/2">
        <h2 class="text-3xl mb-4 font-bold">Welcome to Our Law firm</h2>
        <h3 class="text-xl font-semibold mb-2">Providing expert legal counsel and representation for your needs.</h3>
        <p class="text-lg text-gray-700">Whether you're seeking legal advice or representation, we are here to assist you every step of the way.</p>
    </div>
</section>


<section class="bg-white p-6 md:flex items-center">

    <div class="md:w-1/2">
        <h2 class="text-3xl mb-4 font-bold">Welcome to Our Law firm</h2>
        <h3 class="text-xl font-semibold mb-2">Providing expert legal counsel and representation for your needs.</h3>
        <p class="text-lg text-gray-700">Whether you're seeking legal advice or representation, we are here to assist you every step of the way.</p>
    </div>
    <div class="md:w-1/2 md:pr-8">
        <img src="{{ asset('images/law1.png') }}" alt="Fashion Image" class="w-full rounded-lg">
    </div>
    
</section>


<!-- Featured Products Section -->
<section class="container bg-gray-100  mx-auto py-6">
    <h2 class="text-2xl font-bold  mb-8 text-center uppercase">Our Services</h2>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mx-auto">
        <!-- Example product card -->
        <div class="bg-white shadow-md rounded-lg px-1 py-4">
            <div class="h-64 mb-4">
                <img src="{{ asset('images/law5.png') }}" alt="Product 1" class="object-cover w-full h-full rounded-lg">
            </div>
            <div class="mx-4">
                <h3 class="text-lg font-semibold mb-2">Arbitration</h3>
                <p class="text-gray-600 mb-4">Product description goes here</p>
            </div> 
        </div>
        <!-- Example product card -->
        <div class="bg-white shadow-md rounded-lg px-1 py-4">
            <div class="h-64 mb-4">
                <img src="{{ asset('images/law6.png') }}" alt="Product 1" class="object-cover w-full h-full rounded-lg">
            </div>
            <div class="mx-4">
                <h3 class="text-lg font-semibold mb-2">Arbitration</h3>
                <p class="text-gray-600 mb-4">Product description goes here</p>
            </div> 
        </div>

        <!-- Example product card -->
        <div class="bg-white shadow-md rounded-lg px-1 py-4">
            <div class="h-64 mb-4">
                <img src="{{ asset('images/law3.png') }}" alt="Product 1" class="object-cover w-full h-full rounded-lg">
            </div>
            <div class="mx-4">
                <h3 class="text-lg font-semibold mb-2">Arbitration</h3>
                <p class="text-gray-600 mb-4">Product description goes here</p>
            </div> 
        </div>

          <!-- Example product card -->
        <div class="bg-white shadow-md rounded-lg px-1 py-4">
            <div class="h-64 mb-4">
                <img src="{{ asset('images/law4.png') }}" alt="Product 1" class="object-cover w-full h-full rounded-lg">
            </div>
            <div class="mx-4">
                <h3 class="text-lg font-semibold mb-2">Arbitration</h3>
                <p class="text-gray-600 mb-4">Product description goes here</p>
            </div> 
        </div>
    </div>
  
</section>

<section class="bg-gray-200 py-20">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Providing legal solutions for your needs.</h1>
        <p class="text-lg text-gray-600 mb-8">Ignorance of the Law is No Excuse, Knowledge is Power</p>
        <a href="#" class="bg-black text-white px-6 py-3 rounded-lg inline-block">Consult now</a>
    </div>
</section>

<!-- Contact Form Section -->

@endsection




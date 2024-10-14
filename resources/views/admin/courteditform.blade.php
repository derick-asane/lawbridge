
@vite('resources/css/app.css')


<div class="bg-gray-300 flex items-center justify-center h-screen">

    <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-center">modify Court</h2>
        
        <form method="POST" action="{{ route('store.court')}}" class="space-y-4">
            @csrf
            
            <div>
                <label for="name" class="block font-medium">Court Name</label>
                <input id="name" type="text" name="name" value="{{ $court->name }}" required autofocus class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Enter court name here ...">
            </div>

            <div>
                <label for="phone" class="block font-medium">Phone</label>
                <input id="phone" type="number" name="phone" value="{{ $court->phone }}" required autofocus class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Enter court phone number ...">
            </div>
            
            <div>
                <label for="location" class="block font-medium">Location</label>
                <input id="location" type="text" name="location" value="{{ $court->location }}" required autocomplete="current-password" class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Enter court location ...">
            </div>
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Submit</button>
        </form>
        
    </div>
</div>

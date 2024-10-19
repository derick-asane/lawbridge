

@vite('resources/css/app.css')


<div class="bg-gray-100 flex items-center justify-center h-screen">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-center text-blue-500">Subscribe Now</h2>
        
        <form method="POST" action="{{ route('store.payment')}}" class="space-y-4">
            @csrf
            
            <div>
                <label for="amount" class="block font-medium">Amount</label>
                <input id="amount" type="number" value={{1}} name="amount" required autofocus class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Email Amount ..." disabled>
            </div>
            
            <div>
                <label for="mobilenumber" class="block font-medium">Mobile Number</label>
                <input id="mobilenumber" type="text" name="number" required autocomplete="current-password" class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Enter mobile number ...">
            </div>
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Pay</button>
        </form>
        
        
    </div>
</div>

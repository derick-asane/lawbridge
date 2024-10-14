
@vite('resources/css/app.css')


<div class="bg-gray-300 flex items-center justify-center h-screen">

    <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-center text-blue-500">Register New Case</h2>
        <div class="border-t-4 border-gray-300 border-dotted my-4"></div>
        <form method="POST" action="{{ route('storecase')}}" class="space-y-4">
            @csrf
            
            <div>
                <label for="subject" class="block font-medium">Subject</label>
                <input id="subject" type="text" name="subject" required autofocus class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Enter the subject of the case ...">
            </div>

            <div>
                <label for="type" class="block font-medium">Type</label>
                <select name="type" id="type" required autofocus class="form-input border-b border-gray-400 mt-1 block w-full outline-none">
                    <option value="criminal">Criminal Law</option>
                    <option value="civil">Civil Law</option>
                    <option value="family">Family Law</option>
                    <option value="real estate">Real Estate Law</option>
                    <option value="employment">Employment Law</option>
                    <option value="others">Others</option>
                </select>
            </div>

            <div>
                <label for="description" class="block font-medium">Description</label>
                <textarea id="description" name="description" required autofocus class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Enter the description ..."></textarea>
            </div>
            
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Submit</button>
        </form>
        
        
        </div>
    </div>
</div>

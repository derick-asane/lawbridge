
@vite('resources/css/app.css')


<div class="bg-gray-300 flex items-center justify-center h-screen">

    <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-center">Add CourtDate</h2>
        
        <form method="POST" action="{{ route('store.courtdate')}}" class="space-y-4">
            @csrf
            
            <div>
                <label for="userId" class="block font-medium">UserName</label>
                <select name="userId" id="" class="border-b border-gray-400 mt-1 block w-full outline-none">
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->username}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="courtId" class="block font-medium">CourtName</label>
                <select name="courtId" id="" class="border-b border-gray-400 mt-1 block w-full outline-none">
                    @foreach ($courts as $court)
                    <option value="{{$court->id}}">{{$court->name}}</option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label for="description" class="block font-medium">Description</label>
                <textarea id="description" type="text" name="description" required autocomplete="current-password" class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Enter court location ...">Come on time</textarea>
            </div>

            <div>
                <label for="datetime" class="block font-medium">DateTime</label>
                <input id="datetime" type="datetime-local" name="datetime" required autocomplete="current-password" class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Enter court location ...">
            </div>
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Submit</button>
        </form>
        
    </div>
</div>

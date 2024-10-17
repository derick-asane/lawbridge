
@vite('resources/css/app.css')


<div class="bg-gray-300 flex items-center justify-center h-screen">

    <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6 text-center text-blue-200">Schedule Consultation</h2>
        
        <form method="POST" action="{{ route('store.meeting')}}" class="space-y-4">
            @csrf
            
            <div>
                <label for="userId" class="block font-medium">UserName</label>
                <select name="client_id" id="" class="border-b border-gray-400 mt-1 block w-full outline-none">
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->username}}</option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label for="subject" class="block font-medium">Subject</label>
                <textarea id="subject" type="text" name="subject" required autocomplete="current-password" class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Enter the subject ..."></textarea>
            </div>

            <div>
                <label for="scheduled_at" class="block font-medium">ScheduleDateTime</label>
                <input id="scheduled_at" type="datetime-local" name="scheduled_at" required autocomplete="current-password" class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Enter court location ...">
            </div>
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Submit</button>
        </form>
        
    </div>
</div>




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
        <h2 class="text-2xl font-semibold mb-6 text-center"> Image File</h2>
        
        <form method="POST" action="{{ route('upload.image', ['id'=> $mycase->id])}}" class="space-y-4" enctype="multipart/form-data">
            @csrf
            
            <div>
                <label for="name" class="block font-medium">Image Name</label>
                <input id="name" type="text" name="name" required autofocus class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Email image name ...">
            </div>
            <div>
                <label for="image" class="block font-medium">UpLoad Image</label>
                <input id="image" type="file" name="image" required autofocus class="form-input border-b border-gray-400 mt-1 block w-full outline-none" placeholder="Email Address">
            </div>
            
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Submit</button>
        </form>
        
    </div>
</div>


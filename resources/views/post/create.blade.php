@extends("dashboard")
@section("content")
    <div class="w-full">
        <form class="bg-gray-300 p-5 rounded shadow-sm" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="title" class="block mb-2 text-md font-semibold text-gray-900">Post Title</label>
                <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 placeholder-gray-300" placeholder="Category" required>
                @error('title')
                <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
           <div class="mb-6">
               <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Select an option</label>
               <select id="countries" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                   @foreach($categories as $category)
                       <option value="{{ $category->id }}" {{ $category->id == old('category')? "selected" : "" }}>{{ $category->title }}</option>
                   @endforeach
               </select>
           </div>
            <div class="mb-6">
                <label class="block mb-2 text-md font-semibold text-gray-900 d" for="photo">Upload file</label>
                <input name="photos[]" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="photo" type="file" multiple>
                @error('photos')
                <p class="text-red-600">{{ $message }}</p>
                @enderror
                @error('photos.*')
                <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="">
                    <span class="text-gray-700">Description</span>
                    <textarea id="editor" class="block w-full mt-1 h-auto rounded-lg" name="description"></textarea>
                </label>
                @error('description')
                <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-md font-semibold text-gray-900 d" for="file_input">Upload file</label>
                <input name="feature_image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                @error('feature_image')
                <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
@endsection

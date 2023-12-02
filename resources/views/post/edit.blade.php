@extends("dashboard")
@section("content")
    <div class="w-full">
        <div class="bg-gray-300 p-5 rounded shadow-sm">
            <form class="bg-gray-300 p-5 rounded shadow-sm" action="{{ route('post.update',$post->id) }}" method="post" id="postForm" enctype="multipart/form-data">
                @csrf
                @method("put")
            </form>
            <div class="mb-6">
                <label for="title" class="block mb-2 text-md font-semibold text-gray-900">Post Title</label>
                <input type="text" id="title" form="postForm" name="title" value="{{ old("title",$post->title) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 placeholder-gray-300" placeholder="Post Title" required>
                @error('title')
                <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Select an option</label>
                <select id="countries" name="category" form="postForm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category')? "selected" : "" }}>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6 flex flex-wrap mt-6 w-full justify-center">
                @forelse($post->photos as $photo)
                    <div class="relative mr-2 mb-0">
                        <img src="{{ asset("storage/".$photo->name) }}" class="w-52 rounded-lg relative me-2" alt="">
                        <form action="{{ route("photo.destroy",$photo->id) }}" class="inline-block" method="post">
                            @csrf
                            @method("delete")
                            <button class="py-1 px-2 w-8 bg-red-600 h-8 absolute rounded-lg top-0 right-0">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"> <g> <path fill="none" d="M0 0h24v24H0z"/> <path d="M4 8h16v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V8zm2 2v10h12V10H6zm3 2h2v6H9v-6zm4 0h2v6h-2v-6zM7 5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v2h5v2H2V5h5zm2-1v1h6V4H9z"/> </g> </svg>
                            </button>
                        </form>
                    </div>
                @empty
                @endforelse
            </div>

            <div class="mb-6">
                <label class="block mb-2 text-md font-semibold text-gray-900 d" for="photo">Upload file</label>
                <input name="photos[]" form="postForm" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="photo" type="file" multiple>
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
                    <textarea id="editor" form="postForm" class="block w-full mt-1 h-auto rounded-lg" name="description">{{ $post->description }}</textarea>
                </label>
                @error('description')
                <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                @if($post->feature_image)
                    <img src="{{ asset("storage/".$post->feature_image) }}" alt="">
                @endif
            </div>
            <div class="mb-6">
                <label class="block mb-2 text-md font-semibold text-gray-900 d" for="file_input">Upload file</label>
                <input name="feature_image" form="postForm" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                @error('feature_image')
                <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <button form="postForm" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

        </div>
    </div>
@endsection

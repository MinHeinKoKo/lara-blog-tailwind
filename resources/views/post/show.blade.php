@extends("dashboard")
@section("content")
   <div class="flex justify-center">
       <div class="w-full bg-white border border-gray-200 rounded-lg shadow ">
               <img class="rounded-t-lg" src="{{ asset("storage/".$post->feature_image) }}" alt="" />
           <div>
               <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $post->user->name }}</span>
               <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{ $post->category->title }}</span>
               <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $post->created_at->format("H : i A") }}</span>
           </div>
           <div class="flex justify-center my-3 gap-2 flex-wrap">
               @forelse($post->photos as $photo)
                   <img src="{{ asset('storage/'.$photo->name) }}" class="w-48 rounded-lg" alt="">
               @empty
                   <p>There is no images</p>
               @endforelse
           </div>
           <div class="p-5">
                   <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $post->title }}</h5>
               <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{!! $post->description !!}</p>
               <hr class="my-2 text-xl">
               <div class="flex justify-between items-center my-3">
                   <a href="{{ route('post.create') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-slate-700 rounded-lg hover:bg-blue-800">Create</a>
                   <a href="{{ route('post.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                       Posts
                       <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                   </a>
               </div>
           </div>
       </div>
   </div>

@endsection

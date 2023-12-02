@extends("master")
@section("content")
<div class="max-w-7xl mx-auto mb-3">
    <div class="">
        <img src="{{ asset("storage/".$post->feature_image) }}" class="text-center" alt="">

        <div class="max-w-4xl mx-auto my-3">
            @if($post->photos->count())

                <div id="default-carousel" class="relative" data-carousel="static">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        @foreach($post->photos as $photo)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ asset("storage/".$photo->name) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </div>
                        @endforeach

                    </div>
                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <i class="fas fa-less-than text-button hover:text-yellow-600" style="font-size: 2rem;"></i>
                    </button>
                    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <i class="fas fa-greater-than text-button hover:text-yellow-600" style="font-size: 2rem"></i>
                    </button>
                </div>

            @endif
        </div>

        <div class="max-w-5xl mx-auto dark:bg-description py-5 flex flex-col items-center shadow-lg shadow-cyan-500/50 rounded-md">
            <h1 class="mb-3 text-2xl dark:text-headline text-center">{{ $post->title }}</h1>
            <div>
                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ $post->user->name }}</span>
                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">{{ $post->category->title }}</span>
                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">{{ $post->created_at->format("D M Y") }}</span>
            </div>
            <div class="dark:text-headline text-primary p-5">
                {!! $post->description !!}
            </div>
            <div class="bg-gray-500 dark:bg-blue-200 w-full h-1"></div>
            <div class="w-full p-3 flex justify-start">
                <div>
                    <a href="{{ route("page.index") }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
                  <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                      Posts
                  </span>
                    </a>
                    <a href="{{ route("page.pdf",$post->slug) }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                  <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                      <i class="fas fa-file-pdf"></i>
                  </span>
                    </a>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection

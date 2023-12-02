@extends("master")
@section("content")
<div class="container max-w-7xl mx-auto flex my-5">
    <div class="w-1/3">
        @include("pages.side-bar")
    </div>
    <div class="w-2/3">
        <div class="container mx-auto">
            @if(request("keyword"))
                <div class="flex justify-center items-center gap-2">
                    <p class="text-xl md:text-2xl dark:text-headline my-2">Search By <span class="text-red-400 text-2xl">{{ request("keyword") }}</span></p>
                    <a href="{{ route("page.index") }}" class="">
                        <i class="fas fa-xmark border border-red-400 px-3 py-1 text-red-400 cursor-pointer hover:text-headline rounded-full hover:bg-red-400 "></i>
                    </a>
                </div>
            @endif
        </div>

        <div class="container md:flex md:justify-center w-full flex-wrap gap-2">

            @foreach($posts as $post)
                <a href="{{ route("page.detail",$post->slug) }}" class="max-w-sm h-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    @if($post->feature_image)
                        <img class="rounded-t-lg" src="{{ asset("storage/".$post->feature_image) }}" alt="" />
                        @endif
                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">{{ $post->user->name }}</span>
                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">{{ $post->category->title }}</span>
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">{{ $post->created_at->format("D M Y") }}</span>
                        </div>
                        @if($post->feature_image)
                        @else
                            <div class="mb-3 font-normal text-gray-700 dark:text-white">{!! $post->excerpt !!}</div>
                            @endif
                    </div>
                </a>
            @endforeach
            <div class="mr-auto">
                {{ $posts->onEachSide(1)->links() }}
            </div>

        </div>
    </div>
</div>
@endsection

<div>
{{--    search--}}
    <div>
        <form method="get" action="{{ route("page.index") }}">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input value="{{ request("keyword") }}" type="search" name="keyword" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
    </div>

{{--    Categories--}}
    <div class="my-3">
        <h3 class="text-2xl dark:text-headline text-primary text-center">Categories</h3>
        <div class="flex flex-col gap-1">
                @foreach(\App\Models\Category::all() as $category)
                    <a href="{{ route("page.category",$category->slug) }}" class="relative my-3 rounded-md">
                        @if(request()->url() === route("page.category",$category->slug))
                                <h1 class="h-16 bg-primary text-white transition duration-300 rounded-lg dark:text-primary dark:bg-headline  hover:bg-button hover:text-white text-2xl text-center py-3.5">{{ $category->title }}</h1>
                        @else
                            <img src="{{ asset("storage/".$category->feature_image) }}" class="h-16 w-full object-cover"/>
                            <h1 class="absolute text-2xl text-white top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                {{ $category->title }}</h1>
                        @endif
                    </a>
                @endforeach
        </div>
    </div>
</div>

<div class="">
    <h3 class="text-3xl font-bold text-primary dark:text-headline text-start my-3">Most Viewed Posts</h3>
    @foreach($mostVP as $most)
        <div class="mb-3">
            <a href="{{ route("page.detail",$most->slug) }}" class="relative w-full inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800">
              <span class="relative w-full px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                  {{ $most->title }}
              </span>
            </a>
        </div>
    @endforeach
</div>

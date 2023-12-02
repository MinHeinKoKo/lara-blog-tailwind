<div class="flex">

    <aside id="default-sidebar" class="z-40 w-64 bg-gray-200 shadow-sm hover:shadow-lg p-2 rounded transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="px-3 py-4 overflow-y-auto">
            <ul class="">
                <li class="mb-3">
                    <a href="{{ route("dashboard") }}" class="{{ request()->url() === route('dashboard')? "bg-emerald-300 text-amber-50 rounded-lg":"border-b-2 border-gray-700" }} flex items-center p-2 text-base font-normal text-gray-900 hover:bg-gray-700 transition duration-200 hover:text-white">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-800 {{ request()->url() === route('dashboard')? "text-white":"" }} hover:bg-bg-gray-700 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                        <span class="ml-3 text-lg font-semibold">Dashboard</span>
                    </a>
                </li>
                <p class="text-sm">Category</p>
                <li class="mb-3">
                    <a href="{{ route("category.index") }}" class="{{ request()->url() === route('category.index')? "bg-emerald-300 text-amber-50 rounded-lg":"border-b-2 border-gray-700" }} flex items-center p-2 text-base font-normal text-gray-900 hover:bg-gray-700 transition duration-200 hover:text-white">
                        <i class="fa-solid fa-list text-xl text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="ml-3 text-lg font-semibold">Category</span>
                    </a>
                </li>
                <li class="mb-3">
                    <a href="{{ route("category.create") }}" class="{{ request()->url() === route('category.create')? "bg-emerald-300 text-amber-50 rounded-lg":"border-b-2 border-gray-700" }} flex items-center p-2 text-base font-normal text-gray-900 hover:bg-gray-700 transition duration-200 hover:text-white">
                        <i class="fas fa-layer-group text-blue-400 text-xl text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="ml-3 text-lg font-semibold">Create Category</span>
                    </a>
                </li>
                <p class="text-sm">Posts</p>
                <li class="mb-3">
                    <a href="{{ route('post.index') }}" class="{{ request()->url() === route('post.index')? "bg-emerald-300 text-amber-50 rounded-lg":"border-b-2 border-gray-700" }} flex items-center p-2 text-base font-normal text-gray-900 hover:bg-gray-700 transition duration-200 hover:text-white">
                        <i class="fa-solid fa-list text-xl text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="ml-3 text-lg font-semibold">Post</span>
                    </a>
                </li>
                <li class="mb-3">
                    <a href="{{ route('post.create') }}" class="{{ request()->url() === route('post.create')? "bg-emerald-300 text-amber-50 rounded-lg":"border-b-2 border-gray-700" }} flex items-center p-2 text-base font-normal text-gray-900 hover:bg-gray-700 transition duration-200 hover:text-white">
                        <i class="fas fa-layer-group text-blue-400 text-xl text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="ml-3 text-lg font-semibold">Create Post</span>
                    </a>
                </li>
                <li class="mb-3">
                    <a href="{{ route('post.index',["trash"=>true]) }}" class="active:bg-gray-900 active:text-white flex items-center text-gray-800 border-b-2 border-gray-700 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none hover:bg-gradient-to-r hover:rounded-lg from-cyan-500 to-blue-500 focus:bg-gradient-to-bl focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        <i class="fas fa-trash text-blue-400 text-xl text-red-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="ml-3 text-lg font-semibold">Recycle Bin</span>
                    </a>
                </li>
                @admin
                <p class="text-sm">Users</p>
                <li class="mb-3 text-center">
                    <a href="{{ route("user.index") }}" class="w-full flex items-center p-2 text-base border-b-2 border-gray-700 font-normal text-gray-900 hover:bg-gray-700 transition duration-200 hover:text-white">
                        <i class="fa-solid fa-list text-xl text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="ml-3 text-lg font-semibold">Users</span>
                    </a>
                </li>
                <li class="mb-3">
                    <a href="{{ route("viewer.index") }}" class="flex items-center p-2 border-b-2 border-gray-700 text-base font-normal text-gray-900 hover:bg-gray-700 transition duration-200 hover:text-white">
                        <i class="fas fa-layer-group text-blue-400 text-xl text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="ml-3 text-lg font-semibold">Viewers</span>
                    </a>
                </li>
                @endadmin
            </ul>
        </div>
    </aside>

</div>

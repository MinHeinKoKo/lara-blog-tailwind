@extends("dashboard")
@section("content")

    <div class="">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    @if(\Illuminate\Support\Facades\Auth::user()->role != "author")
                        <th>Owner</th>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::user()->role === "admin")
                        <th scope="col">Viewers</th>
                        @endif
                    <th scope="col" class="px-6 py-3">
                        Control
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created_at
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($posts as $post)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{ $post->id }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                            {{ $post->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $post->category->title }}
                        </td>
                        @if(\Illuminate\Support\Facades\Auth::user()->role !== "author")
                        <td class="px-6 py-4">
                            {{ $post->user->name }}
                        </td>
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->role === "admin")
                            <td class="px-6 py-4">
                                {{ $post->count }}
                            </td>
                        @endif
                        <td class="">
                            <div class="flex">
                                @not_trash
                                    <a href="{{ route('post.show',$post->id) }}">
                                        <span class="bg-purple-100 text-purple-800 text-xs font-sm mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-purple-400 border border-purple-400">Detail</span>
                                    </a>
                                    @can('update',$post)
                                        <a href="{{ route('post.edit',$post->id) }}">
                                            <span class="bg-blue-100 text-blue-800 text-xs font-sm mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Edit</span>
                                        </a>
                                    @endcan
                                @endnot_trash
                                @can('delete',$post)
                                    @trash
                                    <form action="{{ route('post.destroy',[$post->id, "delete"=>"restore"]) }}" method="post" class="">
                                        @csrf
                                        @method('delete')
                                        <button>
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-sm mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300"><i class="fas fa-recycle"></i></span>
                                        </button>
                                    </form>
                                    <form action="{{ route('post.destroy',[$post->id, "delete"=>"force"]) }}" method="post" class="">
                                        @csrf
                                        @method('delete')
                                        <button>
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-sm mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300"><i class="fas fa-trash"></i></span>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('post.destroy',[$post->id, "delete"=>"soft"]) }}" method="post" class="">
                                        @csrf
                                        @method('delete')
                                        <button>
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-sm mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Delete</span>
                                        </button>
                                    </form>
                                    @endtrash
                                @endcan
                            </div>
                        </td>
                        <td>
                            {{ $post->created_at->format("H : i A") }}
                        </td>
                    </tr>
                @empty
                   <tr class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                       <td colspan="6" class="px-6 py-4 font-medium text-gray-900 dark:text-white">There is no table</td>
                   </tr>
                @endforelse
                </tbody>
            </table>
            <div class="">
                {{ $posts->onEachSide(1)->links() }}
            </div>
        </div>
    </div>

@endsection

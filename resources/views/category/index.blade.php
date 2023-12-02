@extends("dashboard")
@section("content")
    <div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 rounded">
                <thead class="text-xs uppercase bg-gray-50 bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>

                    <th scope="col" class="px-6 py-3">
                        User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Control
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created_at
                    </th>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           {{ $category->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $category->user->name }}
                        </td>
                        <td class="px-6 py-4 flex flex-wrap">
                            <a href="{{ route('category.edit',$category->id) }}">
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Edit</span>
                            </a>
                            <form action="{{ route('category.destroy',$category->id) }}" method="post" class="relative">
                                @csrf
                                @method('delete')
                                <button>
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Delete</span>
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4">
                            {{ $category->created_at->format('H : i A') }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection

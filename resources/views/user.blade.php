@extends("dashboard")
@section("content")

    <div class="">
        <div class="relative overflow-x-auto">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-700 text-white">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-700 text-white">
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Post
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-700 text-white">
                            Watch
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                            Control
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-700 text-white">
                            Created
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($users as $user)
                       <tr class="border-b border-gray-200 dark:border-gray-700">
                           <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                               {{ $user->id }}
                           </th>
                           <td class="px-6 py-4 bg-gray-700 text-white">
                               {{ $user->name ?? "guest" }}
                           </td>
                           <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                               {{ $user->email }}
                           </td>
                           <td class="px-6 py-4 bg-gray-700 text-white">
                              {{ $user->role }}
                           </td>
                           <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                               {{ $user->posts->count() }}
                           </td>
                           <td class="px-6 py-4 bg-gray-700 text-white">
                               {{ $user->viewers->count() }}
                           </td>
                           <td class="px-4 py-2 bg-gray-50 dark:bg-gray-800">
                               <div class="flex">
                                       <a href="{{ route('post.edit',$user->id) }}" class="inline-block">
                                           <span class="bg-blue-100 text-blue-800 text-xs font-sm mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Edit</span>
                                       </a>
                                       <form action="{{ route('post.destroy',$user->id) }}" method="post" class="inline-block">
                                           @csrf
                                           @method('delete')
                                           <button>
                                               <span class="bg-yellow-100 text-yellow-800 text-xs font-sm mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Delete</span>
                                           </button>
                                       </form>
                               </div>
                           </td>
                           <td class="px-6 py-4 bg-gray-700 text-white">
                               {{ $user->created_at->format("D M Y") }}
                           </td>
                       </tr>
                   @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection

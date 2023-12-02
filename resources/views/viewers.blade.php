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
                            Post
                        </th>
                        <th scope="col" class="px-6 py-3 bg-gray-700 text-white">
                            Time
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($viewers as $viewer)
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                {{ $viewer->id }}
                            </th>
                            <td class="px-6 py-4 bg-gray-700 text-white">
                                {{ $viewer->user->name }}
                            </td>
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                {{$viewer->post->title }}
                            </td>
                            <td class="px-6 py-4 text-xs bg-gray-700 text-white">
                                <p>{{ $viewer->created_at->format("D M Y") }}</p>
                                <p>{{ $viewer->created_at->format("H : i A") }}</p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $viewers->onEachSide(1)->links() }}
                </div>
            </div>

        </div>
    </div>

@endsection

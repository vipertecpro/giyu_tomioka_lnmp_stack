<div class="overflow-x-auto border-2 rounded-md border-primary-500 border-opacity-50">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-2 w-[20px]"></th>
                <th scope="col" class="p-2">Name</th>
                <th scope="col" class="p-2">Slug</th>
                <th scope="col" class="p-2">Description</th>
                <th scope="col" class="p-2 w-[180px]">Created At</th>
                <th scope="col" class="p-2 w-[180px]">Last Updated At</th>
            </tr>
        </thead>
        <tbody>
            @if($categories->isEmpty())
                <tr class="border-b dark:border-gray-700">
                    <td class="py-52 text-center text-5xl " colspan="6">No records found</td>
                </tr>
            @else
                @foreach($categories as $category)
                    <tr class="border-b dark:border-gray-700">
                        <td class="p-1">
                            <div class="flex items-center justify-end w-fit">
                                <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots-users-{{ $category->id }}" data-dropdown-placement="right-start" class="inline-flex items-center p-1 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-2 focus:outline-primary-50 dark:text-white focus:ring-primary-500 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-primary-600" type="button" data-dropdown-trigger="hover">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                        <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                    </svg>
                                </button>
                                <div id="dropdownDots-users-{{ $category->id }}" class="hidden border border-primary-500 bg-white divide-y divide-gray-100 rounded-lg shadow w-48 dark:bg-gray-700 dark:divide-gray-600 z-50">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                                        <li>
                                            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-yellow-600 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-yellow-300 tableRowAction" data-row-action="reflect" data-table-row-id="{{ $category->id }}" data-table-row-url="{{ route('internal.category') }}" data-row-method="POST">
                                                <svg class="w-5 h-5 me-2 text-inherit bg-inherit" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                                                    <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                                                </svg>
                                                Modify
                                            </a>
                                        </li>
                                    </ul>
                                    <div>
                                        <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-red-600 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-red-400 rounded-b-lg tableRowAction" data-row-action="delete" data-row-method="DELETE" data-table-row-url="{{ route('app.dashboard.categories.delete',$category->id) }}">
                                            <svg class="w-5 h-5 me-2 text-inherit bg-inherit" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                            </svg>
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="p-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ Str::limit($category->name,30) }}</td>
                        <td class="p-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ Str::limit($category->slug,30) }}</td>
                        <td class="p-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ Str::limit($category->descrption,10) }}</td>
                        <td class="p-2">{{ $category->created_at }}</td>
                        <td class="p-2">{{ $category->updated_at }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
{{ $categories->links('restricted.layouts.appFragments.pagination') }}

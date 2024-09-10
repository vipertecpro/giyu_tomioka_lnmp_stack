@extends('restricted.layouts.app')

@section('appContent')
    <div class="grid grid-cols-12 sm:grid-cols-1 md:grid-cols-12 gap-2 ">
        <div class="col-span-12 md:col-span-5 lg:col-span-4 xl:col-span-3 2xl:col-span-2 block w-full p-2 bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="relative overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
                <div class="flex flex-col items-center">
                    <div class="relative group w-32 h-32  border-2 border-primary-500 rounded-full p-1">
                        @if(@$pageData->profile)
                            <img class="" src="{{ asset('assets/images/avatar.png') }}" alt="user photo" />
                        @else
                            <img class="" src="{{ asset('assets/images/avatar.png') }}" alt="user photo" />
                        @endif
                        <button class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-100">
                            <svg class="w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                    @if(@$pageData)
                        <div class="mt-2 text-center">
                            <h3 class="font-bold text-base dark:text-white">{{ $pageData->name }}</h3>
                            <p class="dark:text-gray-400 text-xs">{{ $pageData->email }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-7 lg:col-span-8 xl:col-span-9 2xl:col-span-10 block w-full p-2 bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tbody>
                        <tr class="border-b border-dashed dark:border-gray-700">
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white w-[300px]">Name</td>
                            <td class="px-4 py-3">{{ @$pageData->name }}</td>
                        </tr>
                        <tr class="border-b border-dashed dark:border-gray-700">
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white w-[300px]">Email Address</td>
                            <td class="px-4 py-3 w-full">{{ @$pageData->email }}</td>
                        </tr>
                        <tr class="border-b border-dashed dark:border-gray-700">
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white w-[300px]">Status</td>
                            <td class="px-4 py-3 w-full">{{ @$pageData->status ? 'Active' : 'In-Active' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

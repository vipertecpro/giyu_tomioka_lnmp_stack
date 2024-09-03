@extends('restricted.layouts.app')

@section('appContent')
    <div class="grid grid-cols-12 sm:grid-cols-1 md:grid-cols-12 gap-2 ">
        <div class="col-span-12 md:col-span-5 lg:col-span-4 xl:col-span-3 2xl:col-span-2 block w-full p-2 bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="relative overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
                    <div class="flex flex-col items-center">
                        <div class="relative group w-32 h-32  border-2 border-primary-500 rounded-full p-1">
                            <img class="" src="{{ asset('assets/images/avatar.png') }}" alt="user photo" />
                            <button class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-100">
                                <svg class="w-6 h-6 sm:w-4 sm:h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                        @if(@$pageData)
                            <div class="mt-2 text-center">
                                <h3 class="font-bold text-base dark:text-white">Leslie Livingston</h3>
                                <p class="dark:text-gray-400 text-xs">name@flowbite.com</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        <div class="col-span-12 md:col-span-7 lg:col-span-8 xl:col-span-9 2xl:col-span-10 block w-full p-2 bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="mb-2 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-2 border-b-2 rounded-t-lg" id="general-tab" data-tabs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="false">General</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="roles-and-permissions-tab" data-tabs-target="#roles-and-permissions" type="button" role="tab" aria-controls="roles-and-permissions" aria-selected="false">Roles & Permissions</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="activities-tab" data-tabs-target="#activities" type="button" role="tab" aria-controls="activities" aria-selected="false">Activities</button>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                <div class="hidden p-2 rounded-md" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <form action="#">
                        <div class="grid gap-2 mb-2 sm:grid-cols-2">
                            <div>
                                <label for="full-name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                                <input type="text" name="fullName" id="full-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="John Doe">
                            </div>
                            <div>
                                <label for="email" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="johndoe@gmail.com" required="">
                            </div>
                            <div>
                                <label for="password" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="•••••••••">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="biography" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biography</label>
                                <textarea id="biography" rows="2" class="block p-2 w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write biography here..."></textarea>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2 border-t border-t-gray-300 dark:border-t-gray-700  py-2 justify-end">
                            <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm p-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                Update user
                            </button>
                        </div>
                    </form>
                </div>
                <div class="hidden p-2 rounded-md bg-gray-50 dark:bg-gray-800" id="roles-and-permissions" role="tabpanel" aria-labelledby="roles-and-permissions-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Roles & Permission tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>
                <div class="hidden p-2 rounded-md bg-gray-50 dark:bg-gray-800" id="activities" role="tabpanel" aria-labelledby="activities-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Activities tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('restricted.layouts.app')

@section('appContent')
    <form action="{{ route('app.dashboard.blogs.form') }}" method="POST" class="relative p-2">
        @csrf
        @method('POST')
        <div class="grid grid-cols-12 sm:grid-cols-1 md:grid-cols-12 gap-4 ">
            <div class="col-span-12 lg:col-span-3 space-y-4">
                <div class="col-span-12">
                    <div class="block w-full bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700" data-accordion="open">
                        <h2 id="accordion-open-heading-1">
                            <button type="button" class="flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-1" aria-expanded="true" aria-controls="accordion-open-body-1">
                                <span class="flex items-center">Publish</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                            <div class="p-2 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <div class="flex justify-between items-center space-x-2">
                                    <button type="button" class="flex w-fit items-center justify-center rounded-md bg-primary-700 p-2 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600  dark:hover:bg-primary-700 dark:focus:ring-primary-800 sm:mt-0 sm:w-auto">Publish</button>
                                    <button type="button" class="flex w-fit items-center justify-center rounded-md bg-gray-700 p-2 text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600  dark:hover:bg-gray-700 dark:focus:ring-gray-800 sm:mt-0 sm:w-auto">Save As Draft</button>
                                </div>
                                <div class="flex justify-center items-center">
                                    <div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="block w-full bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700" data-accordion="open">
                        <h2 id="accordion-open-heading-4">
                            <button type="button" class="flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-4" aria-expanded="true" aria-controls="accordion-open-body-3">
                                <span class="flex items-center">Featured Image</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-open-body-4" class="hidden" aria-labelledby="accordion-open-heading-4">
                            <div class="p-2">
                                <div class="bg-white dark:bg-gray-800">
                                    <div>
                                        <img class="rounded-md" src="https://placehold.co/1280x720?text=Placeholder%0A1280x720" alt="Featured Image Placeholder" />
                                    </div>
                                    <div class="flex justify-between items-center p-2">
                                        <button type="button" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-md text-sm p-2 text-center inline-flex items-center me-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                                                <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="sr-only">Edit Featured Image</span>
                                        </button>

                                        <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-md text-sm p-2 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="sr-only">Remove Featured Image</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="block w-full bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700" data-accordion="open">
                        <h2 id="accordion-open-heading-2">
                            <button type="button" class="flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-2" aria-expanded="true" aria-controls="accordion-open-body-2">
                                <span class="flex items-center">Categories</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-heading-2">
                            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 border-t dark:border-gray-600  flex flex-col">
                                <div class="p-2 flex flex-col">
                                    <form class="w-full flex-1">
                                        <label for="default-search" class="text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg aria-hidden="true" class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                </svg>
                                            </div>
                                            <input type="search" id="default-search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-md bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search..." required="">
                                            <button type="submit" class="text-white absolute right-0 bottom-0 top-0 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-r-md text-sm p-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Add new</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="flex-grow overflow-x-auto">
                                    <table class="relative w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="sticky block top-0 z-10 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="p-2">
                                                <div class="flex items-center">
                                                    <input id="checkbox-all" type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                                </div>
                                            </th>
                                            <th scope="col" class="p-2 w-[400px]">Category</th>
                                            <th scope="col" class="p-2 w-[400px] text-end">
                                                <h5>
                                                    <span class="text-gray-500">Selected :</span>
                                                    <span class="dark:text-white">0</span>
                                                </h5>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="block max-h-48 overflow-y-auto">
                                            <tr class="border-b dark:border-gray-600 block w-full">
                                                <td class="w-4 p-2">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-table-search-1" type="checkbox" onclick="event.stopPropagation()" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th colspan="2" scope="row" class="p-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <div class="flex items-center">
                                                        Jese Leos
                                                    </div>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <nav class="flex flex-row items-center justify-between p-2" aria-label="Table navigation">
                                    <div class="flex items-center space-x-2">
                                        <a href="#" class="flex text-sm w-20 items-center justify-center h-full p-2 ml-0 text-gray-500 bg-white rounded-md border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                                    </div>
                                    <div>
                                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                            <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                                        </span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <a href="#" class="flex text-sm w-20 items-center justify-center h-full p-2 leading-tight text-gray-500 bg-white rounded-md border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12">
                    <div class="block w-full bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700" data-accordion="open">
                        <h2 id="accordion-open-heading-3">
                            <button type="button" class="flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-3" aria-expanded="true" aria-controls="accordion-open-body-3">
                                <span class="flex items-center">Tags</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-open-body-3" class="hidden" aria-labelledby="accordion-open-heading-3">
                            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 border-t dark:border-gray-600  flex flex-col">
                                <div class="p-2 flex flex-col">
                                    <form class="w-full flex-1">
                                        <label for="default-search" class="text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                <svg aria-hidden="true" class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                </svg>
                                            </div>
                                            <input type="search" id="default-search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-md bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search..." required="">
                                            <button type="submit" class="text-white absolute right-0 bottom-0 top-0 bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-r-md text-sm p-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Add new</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="flex-grow overflow-x-auto">
                                    <table class="relative w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="sticky block top-0 z-10 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="p-2">
                                                <div class="flex items-center">
                                                    <input id="checkbox-all" type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                                </div>
                                            </th>
                                            <th scope="col" class="p-2 w-[400px]">Tag</th>
                                            <th scope="col" class="p-2 w-[400px] text-end">
                                                <h5>
                                                    <span class="text-gray-500">Selected :</span>
                                                    <span class="dark:text-white">0</span>
                                                </h5>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="block max-h-48 overflow-y-auto">
                                        <tr class="border-b dark:border-gray-600 block w-full">
                                            <td class="w-4 p-2">
                                                <div class="flex items-center">
                                                    <input id="checkbox-table-search-1" type="checkbox" onclick="event.stopPropagation()" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                </div>
                                            </td>
                                            <th colspan="2" scope="row" class="p-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex items-center">
                                                    Jese Leos
                                                </div>
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <nav class="flex flex-row items-center justify-between p-2" aria-label="Table navigation">
                                    <div class="flex items-center space-x-2">
                                        <a href="#" class="flex text-sm w-20 items-center justify-center h-full p-2 ml-0 text-gray-500 bg-white rounded-md border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                                    </div>
                                    <div>
                                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                            <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                                        </span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <a href="#" class="flex text-sm w-20 items-center justify-center h-full p-2 leading-tight text-gray-500 bg-white rounded-md border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-9">
                <div class="block w-full bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700 p-2">
                    <div class="grid gap-2 mb-2 grid-cols-1">
                        <div>
                            <input type="hidden" value="{{ @$pageData->id }}" name="id">
                        </div>
                        <div>
                            <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ @$pageData->title }}" placeholder="Enter the blog title here">
                        </div>
                        <div>
                            <textarea name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" rows="15" placeholder="Enter the blog title here">{{ @$pageData->content }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

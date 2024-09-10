@extends('restricted.layouts.app')

@section('appContent')
    <div class="grid grid-cols-12 sm:grid-cols-1 md:grid-cols-12 gap-2 ">
        <div class="col-span-7">
            <div class="col-span-12 block w-full bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700">
                <form action="{{ route('app.dashboard.blogs.form') }}" method="POST" class="relative p-2">
                    @csrf
                    @method('POST')
                    <input type="hidden" value="{{ @$pageData->id }}" name="id">
                    <div class="grid gap-2 mb-2 sm:grid-cols-1">
                        <div>
                            <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ @$pageData->title }}" placeholder="Enter the blog title here">
                        </div>
                        <div>
                            <textarea name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" rows="15" placeholder="Enter the blog title here">{{ @$pageData->content }}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-span-5 space-y-2">
            <div class="col-span-12 block w-full p-2 bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center space-x-2 border-t border-t-gray-300 dark:border-t-gray-700  py-2 justify-end mt-5">
                    <a href="{{ route('app.dashboard.blogs.list') }}" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-md text-sm p-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        Cancel
                    </a>
                    <button type="button" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-2 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm p-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 formSubmit">
                        Submit
                    </button>
                </div>
            </div>
            <div class="col-span-12 block w-full p-2 bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center space-x-2 border-t border-t-gray-300 dark:border-t-gray-700  py-2 justify-end mt-5">
                    <a href="{{ route('app.dashboard.blogs.list') }}" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-md text-sm p-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        Cancel
                    </a>
                    <button type="button" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-2 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm p-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 formSubmit">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('restricted.layouts.app')

@section('appContent')
    <form action="{{ route('app.dashboard.blogs.form') }}" method="POST" class="relative p-2">
        @csrf
        @method('POST')
        <div class="grid grid-cols-12 sm:grid-cols-1 md:grid-cols-12 gap-4">
            <div class="col-span-12">
                <div class="grid gap-2 mb-2 grid-cols-1">
                    <div class="flex flex-col justify-start items-center w-full border-0 dark:text-gray-300 focus:ring-gray-200 dark:focus:ring-gray-600 dark:bg-gray-800 dark:placeholder-gray-500 rounded-md p-2">
                        <input type="hidden" value="{{ @$pageData->id }}" name="id">
                        <div class="flex mb-2 justify-end gap-2 py-2 w-full">
                            <button type="submit" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm p-1 md:p-2 text-center inline-flex items-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                Save as draft
                            </button>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm p-1 md:p-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Publish
                            </button>
                        </div>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="block w-full h-20 text-3xl border-0 dark:text-gray-300 focus:ring-gray-200 dark:focus:ring-gray-600 dark:bg-gray-800 dark:placeholder-gray-500 font-semibold"
                            value="{{ @$pageData->title }}"
                            placeholder="Enter the blog title here" />
                        <article class="format lg:format-lg my-2  max-w-full w-full">
                            <div id="blog-description" data-image-upload-api="{{ route('internal.uploadImage') }}">{{ @$pageData->content }}</div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <aside id="drawer-blog-settings" class="fixed top-[60px] right-0 z-40 w-full md:w-1/2 lg:w-1/3 xl:w-1/4 2xl:w-1/5 h-screen transition-transform translate-x-full bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 flex flex-col overflow-y-auto" tabindex="-1" aria-labelledby="drawer-blog-settings">
    <h5 id="drawer-blog-settings" class="inline-flex items-center p-4 text-base font-semibold text-gray-500 dark:text-gray-400">
       Blog Settings
    </h5>
    <button type="button" data-drawer-hide="drawer-blog-settings" aria-controls="drawer-blog-settings" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-md text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div class="flex flex-col justify-start overflow-y-scroll p-2 border-t border-gray-400 dark:border-gray-600 relative scroll-smooth pb-20">
        <div class="grid grid-cols-1 gap-2">
            <div class="col-span-12">
                @include('restricted.layouts.widgets.featuredImage')
            </div>
            <div class="col-span-12">
                @include('restricted.layouts.widgets.table.categories.index')
            </div>
            <div class="col-span-12">
                @include('restricted.layouts.widgets.table.tags.index')
            </div>
        </div>
    </div>
</aside>
@endsection

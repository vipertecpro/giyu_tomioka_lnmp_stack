@extends('restricted.layouts.app')

@section('appContent')
    <form action="{{ route('app.dashboard.blogs.form') }}" method="POST" class="relative p-2">
        @csrf
        @method('POST')
        <div class="grid grid-cols-12 sm:grid-cols-1 md:grid-cols-12 gap-4 ">
            <div class="col-span-12 lg:col-span-3 space-y-4">
                <div class="col-span-12">
                    <div
                        class="block w-full bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700"
                        data-accordion="open">
                        <h2 id="accordion-open-heading-1">
                            <button type="button"
                                    class="flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                    data-accordion-target="#accordion-open-body-1" aria-expanded="true"
                                    aria-controls="accordion-open-body-1">
                                <span class="flex items-center">Publish</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
                            <div class="p-2 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <div class="flex justify-between items-center space-x-2">
                                    <button type="button"
                                            class="flex w-fit items-center justify-center rounded-md bg-primary-700 p-2 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600  dark:hover:bg-primary-700 dark:focus:ring-primary-800 sm:mt-0 sm:w-auto">
                                        Publish
                                    </button>
                                    <button type="button"
                                            class="flex w-fit items-center justify-center rounded-md bg-gray-700 p-2 text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600  dark:hover:bg-gray-700 dark:focus:ring-gray-800 sm:mt-0 sm:w-auto">
                                        Save As Draft
                                    </button>
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
                    @include('restricted.layouts.widgets.featuredImage')
                </div>
                <div class="col-span-12" data-render-widget="categories" data-widget-source-api="{{ route('internal.widgets.append') }}" data-widget-default-values="56,55,51,52,1,5" data-widget-updated-values=""></div>
                <div class="col-span-12">
                    @include('restricted.layouts.widgets.tags')
                </div>
            </div>
            <div class="col-span-12 lg:col-span-9">
                <div
                    class="block w-full bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700 p-2">
                    <div class="grid gap-2 mb-2 grid-cols-1">
                        <div>
                            <input type="hidden" value="{{ @$pageData->id }}" name="id">
                        </div>
                        <div>
                            <input type="text" name="title" id="title"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                   value="{{ @$pageData->title }}" placeholder="Enter the blog title here">
                        </div>
                        <div>
                            <textarea name="title" id="title"
                                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                      rows="15"
                                      placeholder="Enter the blog title here">{{ @$pageData->content }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@extends('client.layouts.app')

@section('appContent')
    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-8">
        <div class="px-4 2xl:px-0">
            <div class="gap-8 lg:flex">
                <!-- Sidenav -->
                <aside id="sidebar" class="hidden h-full w-80 shrink-0 border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 lg:block lg:rounded-lg">
                    <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                        <h2 id="accordion-flush-heading-1">
                            <button type="button" class="mb-4 flex w-full items-center justify-between font-medium text-gray-500 hover:text-gray-900 dark:bg-transparent dark:text-gray-400 dark:hover:text-white rtl:text-right dark:!bg-gray-800" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
                                <span>Categories</span>
                                <svg data-accordion-icon class="h-5 w-5 shrink-0 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-1" class="mb-4 hidden space-y-4" aria-labelledby="accordion-flush-heading-1">
                            <div>
                                <label for="search" class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-white">Search</label>
                                <div class="relative block">
                                    <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="search" id="search" class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 ps-10 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Search for categories" required />
                                </div>
                            </div>

                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <input id="tv-audio-video" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="tv-audio-video" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> TV, Audio-Video </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="desktop-pc" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" checked />
                                    <label for="desktop-pc" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Desktop PC </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="gaming" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="gaming" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Gaming </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="monitors" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="monitors" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Monitors </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="laptops" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" checked />
                                    <label for="laptops" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Laptops </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="console" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="console" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Console </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="tablets" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" checked />
                                    <label for="tablets" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Tablets </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="foto" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="foto" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Foto </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="fashion" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="fashion" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Fashion </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="books" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="books" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Books </label>
                                </div>
                            </div>

                            <a href="#" title="" class="inline-flex items-center gap-1 text-sm font-medium text-primary-700 hover:underline dark:text-primary-500">
                                See more
                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                </svg>
                            </a>
                        </div>
                        <h2 id="accordion-flush-heading-2">
                            <button type="button" class="mb-4 flex w-full items-center justify-between font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white rtl:text-right dark:!bg-gray-800" data-accordion-target="#accordion-flush-body-2" aria-expanded="true" aria-controls="accordion-flush-body-2">
                                <span>Rating</span>
                                <svg data-accordion-icon class="h-5 w-5 shrink-0 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-2" class="mb-4 hidden space-y-4" aria-labelledby="accordion-flush-heading-2">
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <input id="rating-checkbox-1" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" checked />
                                    <label for="rating-checkbox-1" class="ms-2 inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-gray-400">
                                        <div class="flex items-center gap-0.5">
                                            <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                        </div>
                                        (475)
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="rating-checkbox-2" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" checked />
                                    <label for="rating-checkbox-2" class="ms-2 inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-gray-400">
                                        <div class="flex items-center gap-0.5">
                                            <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                        </div>
                                        (12)
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="rating-checkbox-3" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="rating-checkbox-3" class="ms-2 inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-gray-400">
                                        <div class="flex items-center gap-0.5">
                                            <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                        </div>
                                        (20)
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="rating-checkbox-4" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="rating-checkbox-4" class="ms-2 inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-gray-400">
                                        <div class="flex items-center gap-0.5">
                                            <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                        </div>
                                        (11)
                                    </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="rating-checkbox-5" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="rating-checkbox-5" class="ms-2 inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-gray-400">
                                        <div class="flex items-center gap-0.5">
                                            <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                            <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                        </div>
                                        (6)
                                    </label>
                                </div>
                            </div>

                            <a href="#" title="" class="inline-flex items-center gap-1 text-sm font-medium text-primary-700 hover:underline dark:text-primary-500">
                                View all
                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                </svg>
                            </a>
                        </div>
                        <h2 id="accordion-flush-heading-3">
                            <button type="button" class="mb-4 flex w-full items-center justify-between font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white rtl:text-right dark:!bg-gray-800" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                                <span>Price</span>
                                <svg data-accordion-icon class="h-5 w-5 shrink-0 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-3" class="mb-4 hidden space-y-4" aria-labelledby="accordion-flush-heading-3">
                            <div class="space-y-3">
                                <a href="#" title="" class="inline-flex items-center gap-1 text-sm font-medium text-primary-700 hover:underline dark:text-primary-500">
                                    <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                                    </svg>
                                    Any Price
                                </a>
                                <div class="space-y-3">
                                    <div class="flex items-center">
                                        <input id="price-range-1" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                        <label for="price-range-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Under $10 </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="price-range-2" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" checked />
                                        <label for="price-range-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> $10 to $20 </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="price-range-3" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                        <label for="price-range-3" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> $20 to $30 </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="price-range-4" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                        <label for="price-range-4" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> $30 to $40 </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="price-range-5" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" checked />
                                        <label for="price-range-5" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> $40 to $50 </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="price-range-6" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                        <label for="price-range-6" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> $50 to $60 </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="price-range-7" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" checked />
                                        <label for="price-range-7" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> $60 to $70 </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="price-range-8" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                        <label for="price-range-8" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> $70 to $80 </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="price-range-9" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                        <label for="price-range-9" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> $80 to $90 </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input id="price-range-10" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                        <label for="price-range-10" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Over $100 </label>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="from_amount" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> From </label>
                                    <input type="text" id="from_amount" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="300" required />
                                </div>

                                <div>
                                    <label for="to_amount" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> To </label>
                                    <input type="text" id="to_amount" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="3500" required />
                                </div>
                            </div>
                        </div>
                        <h2 id="accordion-flush-heading-4">
                            <button type="button" class="mb-4 flex w-full items-center justify-between font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white rtl:text-right dark:!bg-gray-800" data-accordion-target="#accordion-flush-body-4" aria-expanded="false" aria-controls="accordion-flush-body-4">
                                <span>Shipping to</span>
                                <svg data-accordion-icon class="h-5 w-5 shrink-0 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-4" class="mb-4 hidden space-y-4" aria-labelledby="accordion-flush-heading-4">
                            <div class="space-y-3">
                                <label for="asia" class="relative block">
                                    <input type="checkbox" name="asia" id="asia" class="peer absolute left-2 top-2 appearance-none" />
                                    <div class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-primary-700 peer-checked:bg-primary-50 peer-checked:text-primary-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:peer-checked:border-primary-600 dark:peer-checked:bg-primary-900 dark:peer-checked:text-primary-300">
                                        <p class="text-sm font-medium">Asia</p>
                                        <p class="text-sm font-normal">Delivery for Asia for <span class="font-medium">$954</span></p>
                                    </div>
                                </label>

                                <label for="africa" class="relative block">
                                    <input type="checkbox" name="africa" id="africa" class="peer absolute left-2 top-2 appearance-none" />
                                    <div class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-primary-700 peer-checked:bg-primary-50 peer-checked:text-primary-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:peer-checked:border-primary-600 dark:peer-checked:bg-primary-900 dark:peer-checked:text-primary-300">
                                        <p class="text-sm font-medium">Africa</p>
                                        <p class="text-sm font-normal">Delivery for Africa for <span class="font-medium">$706,834</span></p>
                                    </div>
                                </label>

                                <label for="americas" class="relative block">
                                    <input type="checkbox" name="americas" id="americas" class="peer absolute left-2 top-2 appearance-none" checked />
                                    <div class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-primary-700 peer-checked:bg-primary-50 peer-checked:text-primary-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:peer-checked:border-primary-600 dark:peer-checked:bg-primary-900 dark:peer-checked:text-primary-300">
                                        <p class="text-sm font-medium">Americas</p>
                                        <p class="text-sm font-normal">Delivery for USA for <span class="font-medium">$365,35</span></p>
                                    </div>
                                </label>

                                <label for="australia" class="relative block">
                                    <input type="checkbox" name="australia" id="australia" class="peer absolute left-2 top-2 appearance-none" checked />
                                    <div class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-primary-700 peer-checked:bg-primary-50 peer-checked:text-primary-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:peer-checked:border-primary-600 dark:peer-checked:bg-primary-900 dark:peer-checked:text-primary-300">
                                        <p class="text-sm font-medium">Australia/Oceania</p>
                                        <p class="text-sm font-normal">Delivery for Australia for <span class="font-medium">$209,98</span></p>
                                    </div>
                                </label>

                                <label for="europe" class="relative block">
                                    <input type="checkbox" name="europe" id="europe" class="peer absolute left-2 top-2 appearance-none" />
                                    <div class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-primary-700 peer-checked:bg-primary-50 peer-checked:text-primary-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:peer-checked:border-primary-600 dark:peer-checked:bg-primary-900 dark:peer-checked:text-primary-300">
                                        <p class="text-sm font-medium">Europe</p>
                                        <p class="text-sm font-normal">Delivery for Europe for <span class="font-medium">$1,365,35</span></p>
                                    </div>
                                </label>

                                <label for="antarctica" class="relative block">
                                    <input type="checkbox" name="antarctica" id="antarctica" class="peer absolute left-2 top-2 appearance-none" />
                                    <div class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-primary-700 peer-checked:bg-primary-50 peer-checked:text-primary-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:peer-checked:border-primary-600 dark:peer-checked:bg-primary-900 dark:peer-checked:text-primary-300">
                                        <p class="text-sm font-medium">Antarctica</p>
                                        <p class="text-sm font-normal">N/A</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <h2 id="accordion-flush-heading-5">
                            <button type="button" class="mb-4 flex w-full items-center justify-between font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white rtl:text-right dark:!bg-gray-800" data-accordion-target="#accordion-flush-body-5" aria-expanded="false" aria-controls="accordion-flush-body-5">
                                <span>Color</span>
                                <svg data-accordion-icon class="h-5 w-5 shrink-0 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-5" class="mb-4 hidden space-y-4" aria-labelledby="accordion-flush-heading-5">
                            <div>
                                <label class="sr-only">Color</label>

                                <div class="mt-2 flex items-center gap-2">
                                    <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-gray-900 focus:outline-none has-[:checked]:ring-2">
                                        <input type="radio" name="color-choice" value="Black" class="sr-only" checked />
                                        <span id="color-choice-0-label" class="sr-only"> Black </span>
                                        <span aria-hidden="true" class="h-7 w-7 rounded-full border border-gray-900 border-opacity-10 bg-gray-900"></span>
                                    </label>

                                    <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-primary-700 focus:outline-none has-[:checked]:ring-2">
                                        <input type="radio" name="color-choice" value="Blue" class="sr-only" />
                                        <span id="color-choice-0-label" class="sr-only"> Blue </span>
                                        <span aria-hidden="true" class="h-7 w-7 rounded-full border border-primary-700 border-opacity-10 bg-primary-700"></span>
                                    </label>

                                    <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-pink-600 focus:outline-none has-[:checked]:ring-2">
                                        <input type="radio" name="color-choice" value="Pink" class="sr-only" />
                                        <span id="color-choice-0-label" class="sr-only"> Pink </span>
                                        <span aria-hidden="true" class="h-7 w-7 rounded-full border border-pink-600 border-opacity-10 bg-pink-600"></span>
                                    </label>

                                    <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-teal-600 focus:outline-none has-[:checked]:ring-2">
                                        <input type="radio" name="color-choice" value="Teal" class="sr-only" />
                                        <span id="color-choice-0-label" class="sr-only"> Teal </span>
                                        <span aria-hidden="true" class="h-7 w-7 rounded-full border border-teal-600 border-opacity-10 bg-teal-600"></span>
                                    </label>

                                    <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-purple-600 focus:outline-none has-[:checked]:ring-2">
                                        <input type="radio" name="color-choice" value="Purple" class="sr-only" />
                                        <span id="color-choice-0-label" class="sr-only"> Purple </span>
                                        <span aria-hidden="true" class="h-7 w-7 rounded-full border border-purple-600 border-opacity-10 bg-purple-600"></span>
                                    </label>

                                    <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-yellow-400 focus:outline-none has-[:checked]:ring-2">
                                        <input type="radio" name="color-choice" value="Yellow" class="sr-only" />
                                        <span id="color-choice-0-label" class="sr-only"> Yellow </span>
                                        <span aria-hidden="true" class="h-7 w-7 rounded-full border border-yellow-400 border-opacity-10 bg-yellow-400"></span>
                                    </label>

                                    <label class="relative -m-0.5 flex cursor-pointer items-center justify-center rounded-full p-0.5 ring-green-600 focus:outline-none has-[:checked]:ring-2">
                                        <input type="radio" name="color-choice" value="Green" class="sr-only" />
                                        <span id="color-choice-0-label" class="sr-only"> Green </span>
                                        <span aria-hidden="true" class="h-7 w-7 rounded-full border border-green-600 border-opacity-10 bg-green-600"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <h2 id="accordion-flush-heading-6">
                            <button type="button" class="mb-4 flex w-full items-center justify-between font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white rtl:text-right dark:!bg-gray-800" data-accordion-target="#accordion-flush-body-6" aria-expanded="false" aria-controls="accordion-flush-body-6">
                                <span>Delivery Method</span>
                                <svg data-accordion-icon class="h-5 w-5 shrink-0 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-6" class="mb-4 hidden space-y-4" aria-labelledby="accordion-flush-heading-6">
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <input id="flowbox" type="radio" name="delivery" value="" class="h-4 w-4 border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="flowbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Flowbox </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="pick-from-store" type="radio" name="delivery" value="" class="h-4 w-4 border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="pick-from-store" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Pick up from the store </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="courier" type="radio" name="delivery" value="" class="h-4 w-4 border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="courier" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Fast courier </label>
                                </div>
                            </div>
                        </div>
                        <h2 id="accordion-flush-heading-7">
                            <button type="button" class="mb-4 flex w-full items-center justify-between font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white rtl:text-right dark:!bg-gray-800" data-accordion-target="#accordion-flush-body-7" aria-expanded="false" aria-controls="accordion-flush-body-7">
                                <span>Condition</span>
                                <svg data-accordion-icon class="h-5 w-5 shrink-0 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-7" class="mb-4 hidden space-y-4" aria-labelledby="accordion-flush-heading-7">
                            <div class="flex items-center">
                                <input id="new" type="radio" name="condition" value="" class="h-4 w-4 border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                <label for="new" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> New Product</label>
                            </div>

                            <div class="flex items-center">
                                <input id="used" type="radio" name="condition" value="" class="h-4 w-4 border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                <label for="used" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Used Prooduct</label>
                            </div>

                            <div class="flex items-center">
                                <input id="resealed" type="radio" name="condition" value="" class="h-4 w-4 border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                <label for="resealed" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Resealed </label>
                            </div>
                        </div>
                        <h2 id="accordion-flush-heading-8">
                            <button type="button" class="flex w-full items-center justify-between font-medium text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white rtl:text-right dark:!bg-gray-800" data-accordion-target="#accordion-flush-body-8" aria-expanded="false" aria-controls="accordion-flush-body-8">
                                <span>Weight</span>
                                <svg data-accordion-icon class="h-5 w-5 shrink-0 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-flush-body-8" class="my-4 hidden space-y-4" aria-labelledby="accordion-flush-heading-8">
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <input id="weight-1" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="weight-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Under 1 kg </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="weight-2" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" checked />
                                    <label for="weight-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> 1 kg to 5 kg </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="weight-3" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="weight-3" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> 5 kg to 10 kg </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="weight-4" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="weight-4" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> 10 kg to 20 kg </label>
                                </div>

                                <div class="flex items-center">
                                    <input id="weight-5" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="weight-5" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Over 20 kg </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- Right content -->
                <div class="w-full">
                    <div class="mb-4 items-center justify-between md:flex md:space-x-4">
                        <form class="w-full flex-1 md:mr-4 md:max-w-md">
                            <label for="default-search" class="sr-only text-sm font-medium text-gray-900 dark:text-white">Search</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg aria-hidden="true" class="h-4 w-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="search" id="default-search" class="block w-full rounded-lg border border-gray-300 bg-white p-2 pl-9 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Search by product name" required="" />
                                <button type="submit" class="absolute bottom-0 right-0 top-0 rounded-r-lg bg-primary-700 px-4 py-2 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Search</button>
                            </div>
                        </form>

                        <div class="mt-4 items-center space-y-4 sm:flex sm:space-x-4 sm:space-y-0 md:mt-0">
                            <button id="dropdownFilterButton2" data-dropdown-toggle="dropdownFilter2" type="button" class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 md:w-auto">
                                <svg class="-ms-0.5 me-1.5 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                                </svg>
                                Filter
                                <svg class="-me-0.5 ms-1.5 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                                </svg>
                            </button>
                            <!-- Filter Dropdown Menu -->
                            <div id="dropdownFilter2" class="z-50 hidden w-56 rounded-lg bg-white p-2 shadow dark:bg-gray-700">
                                <h6 class="mb-2 ps-3 text-sm font-medium text-gray-900 dark:text-white">Status</h6>
                                <ul class="mb-3 text-sm" aria-labelledby="dropdownFilterButton2">
                                    <li>
                                        <label class="flex w-full items-center rounded-md px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <input type="checkbox" value="" class="mr-2 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-primary-600" />
                                            Active
                                        </label>
                                    </li>
                                    <li>
                                        <label class="flex w-full items-center rounded-md px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <input type="checkbox" value="" class="mr-2 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-primary-600" checked />
                                            Pending
                                        </label>
                                    </li>
                                    <li>
                                        <label class="flex w-full items-center rounded-md px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <input type="checkbox" value="" class="mr-2 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-primary-600" />
                                            Expired
                                        </label>
                                    </li>
                                    <li>
                                        <label class="flex w-full items-center rounded-md px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <input type="checkbox" value="" class="mr-2 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-primary-600" />
                                            Cancelled
                                        </label>
                                    </li>
                                </ul>
                                <h6 class="mb-2 ps-3 text-sm font-medium text-gray-900 dark:text-white">Type</h6>
                                <ul class="mb-3 text-sm" aria-labelledby="dropdownDefault">
                                    <li>
                                        <label class="flex w-full items-center rounded-md px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <input type="checkbox" value="" class="mr-2 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-primary-600" />
                                            Limited
                                        </label>
                                    </li>
                                    <li>
                                        <label class="flex w-full items-center rounded-md px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <input type="checkbox" value="" class="mr-2 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-primary-600" />
                                            Standard
                                        </label>
                                    </li>
                                    <li>
                                        <label class="flex w-full items-center rounded-md px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <input type="checkbox" value="" class="mr-2 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-primary-600" checked />
                                            Extended
                                        </label>
                                    </li>
                                    <li>
                                        <label class="flex w-full items-center rounded-md px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <input type="checkbox" value="" class="mr-2 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-primary-600" />
                                            Premium
                                        </label>
                                    </li>
                                </ul>
                                <h6 class="mb-2 ps-3 text-sm font-medium text-gray-900 dark:text-white">length</h6>
                                <ul class="mb-3 text-sm" aria-labelledby="dropdownDefault">
                                    <li>
                                        <label class="flex w-full items-center rounded-md px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <input type="checkbox" value="" class="mr-2 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-primary-600" />
                                            12 months
                                        </label>
                                    </li>
                                    <li>
                                        <label class="flex w-full items-center rounded-md px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <input type="checkbox" value="" class="mr-2 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-primary-600" />
                                            24 months
                                        </label>
                                    </li>
                                    <li>
                                        <label class="flex w-full items-center rounded-md px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <input type="checkbox" value="" class="mr-2 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-primary-600" />
                                            36 months
                                        </label>
                                    </li>
                                    <li>
                                        <label class="flex w-full items-center rounded-md px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <input type="checkbox" value="" class="mr-2 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-primary-600" />
                                            48 months
                                        </label>
                                    </li>
                                    <li>
                                        <label class="flex w-full items-center rounded-md px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600">
                                            <input type="checkbox" value="" class="mr-2 h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-primary-600" />
                                            60 months
                                        </label>
                                    </li>
                                </ul>
                                <button type="button" class="w-full rounded-lg bg-primary-700 px-3 py-2 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Apply</button>
                            </div>
                            <button id="showDropdownButton2" data-dropdown-toggle="showDropdown2" type="button" class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 md:w-auto">
                                Show: Active only
                                <svg class="-me-0.5 ms-1.5 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="showDropdown2" class="z-10 hidden w-36 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700" data-popper-placement="bottom">
                                <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400" aria-labelledby="filterDropdownButtonButton2">
                                    <li>
                                        <a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <span class="me-2 h-2.5 w-2.5 rounded-full bg-green-600"></span>
                                            <span>Active</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <span class="me-2 h-2.5 w-2.5 rounded-full bg-primary-700"></span>
                                            Pre-order
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <span class="me-2 h-2.5 w-2.5 rounded-full bg-yellow-300"></span>
                                            Pending
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                                            <span class="me-2 h-2.5 w-2.5 rounded-full bg-red-600"></span>
                                            Expired
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Cards -->
                    <div class="mb-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="items-start justify-between border-b border-gray-100 pb-4 dark:border-gray-700 md:flex">
                            <div class="mb-4 justify-between sm:flex sm:items-center md:mb-0 md:block lg:mb-4 lg:flex xl:mb-0 xl:block">
                                <div class="items-center gap-4 sm:flex">
                                    <a href="#" class="h-14 w-14 shrink-0">
                                        <img class="h-full max-h-64 w-full dark:hidden sm:max-h-full" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg" alt="imac image" />
                                        <img class="hidden h-full max-h-64 w-full dark:block sm:max-h-full" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg" alt="imac image" />
                                    </a>
                                    <div class="mt-4 sm:mt-0">
                                        <div class="mb-2 items-center sm:flex sm:space-x-2">
                                            <a href="#" class="mb-2 block font-semibold text-gray-900 hover:underline dark:text-white sm:mb-0 sm:flex">Apple iMac 27", 1TB HDD, Retina 5K</a>
                                            <span class="inline-flex items-center rounded bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                      <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 4h-13m13 16h-13M8 20v-3.333a2 2 0 0 1 .4-1.2L10 12.6a1 1 0 0 0 0-1.2L8.4 8.533a2 2 0 0 1-.4-1.2V4h8v3.333a2 2 0 0 1-.4 1.2L13.957 11.4a1 1 0 0 0 0 1.2l1.643 2.867a2 2 0 0 1 .4 1.2V20H8Z"></path>
                      </svg>
                      Pending
                    </span>
                                        </div>
                                        <a href="#" class="flex items-center font-medium text-primary-700 hover:underline dark:text-primary-500">
                                            <svg class="me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                                            </svg>
                                            Download certificate
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <button data-drawer-target="extend-warranty-drawer" data-drawer-show="extend-warranty-drawer" data-drawer-placement="right" type="button" class="w-full rounded-lg bg-primary-700 px-3 py-2 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 md:w-auto">Extend</button>
                        </div>
                        <div class="mb-4 items-center sm:flex sm:flex-wrap xl:flex">
                            <dl class="mt-4 flex items-center text-gray-500 dark:text-gray-400 sm:me-8">
                                <dt class="me-2 font-medium text-gray-900 dark:text-white">Warranty length:</dt>
                                <dd>24 months</dd>
                            </dl>
                            <dl class="mt-4 flex items-center text-gray-500 dark:text-gray-400 sm:me-8">
                                <dt class="me-2 font-medium text-gray-900 dark:text-white">Warranty type:</dt>
                                <dd>Extended</dd>
                            </dl>
                            <dl class="mt-4 flex items-center text-gray-500 dark:text-gray-400">
                                <dt class="sr-only">Warranty info:</dt>
                                <dd class="flex items-center">
                                    <button data-tooltip-target="warranty-desc-1" data-tooltip-trigger="hover" class="text-gray-400 hover:text-gray-900 dark:text-gray-500 dark:hover:text-white">
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div id="warranty-desc-1" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(982.5px, -412px, 0px);" data-popper-placement="top">
                                        This guarantee is provided by the product manufacturer.
                                        <div class="tooltip-arrow" data-popper-arrow=""></div>
                                    </div>
                                    <span class="ms-2 font-medium text-gray-900 dark:text-white">Manufacturer's warranty</span>
                                </dd>
                            </dl>
                        </div>
                        <div class="flex items-center rounded-lg bg-orange-50 px-4 py-3 text-sm text-orange-800 dark:bg-gray-700 dark:text-orange-300" role="alert">
                            <svg class="me-2 hidden h-4 w-4 flex-shrink-0 sm:flex" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>Expires on: <span class="font-medium">Friday 16 Jul 2026</span></div>
                        </div>
                    </div>
                    <div class="mb-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="items-start justify-between border-b border-gray-100 pb-4 dark:border-gray-700 md:flex">
                            <div class="mb-4 justify-between sm:flex sm:items-center md:mb-0 md:block lg:mb-4 lg:flex xl:mb-0 xl:block">
                                <div class="items-center gap-4 sm:flex">
                                    <a href="#" class="h-14 w-14 shrink-0">
                                        <img class="h-full max-h-64 w-full dark:hidden sm:max-h-full" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/iphone-light.svg" alt="imac image" />
                                        <img class="hidden h-full max-h-64 w-full dark:block sm:max-h-full" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/iphone-dark.svg" alt="imac image" />
                                    </a>
                                    <div class="mt-4 sm:mt-0">
                                        <div class="mb-2 items-center sm:flex sm:space-x-2">
                                            <a href="#" class="mb-2 block font-semibold text-gray-900 hover:underline dark:text-white sm:mb-0 sm:flex">Apple iPhone 14</a>
                                            <span class="inline-flex items-center rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                      <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"></path>
                      </svg>
                      Active
                    </span>
                                        </div>
                                        <a href="#" class="flex items-center font-medium text-primary-700 hover:underline dark:text-primary-500">
                                            <svg class="me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                                            </svg>
                                            Download certificate
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <button data-drawer-target="extend-warranty-drawer" data-drawer-show="extend-warranty-drawer" data-drawer-placement="right" type="button" class="w-full rounded-lg bg-primary-700 px-3 py-2 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 md:w-auto">Extend</button>
                        </div>
                        <div class="mb-4 items-center sm:flex sm:flex-wrap xl:flex">
                            <dl class="mt-4 flex items-center text-gray-500 dark:text-gray-400 sm:me-8">
                                <dt class="me-2 font-medium text-gray-900 dark:text-white">Warranty length:</dt>
                                <dd>12 months</dd>
                            </dl>
                            <dl class="mt-4 flex items-center text-gray-500 dark:text-gray-400 sm:me-8">
                                <dt class="me-2 font-medium text-gray-900 dark:text-white">Warranty type:</dt>
                                <dd>Limited</dd>
                            </dl>
                            <dl class="mt-4 flex items-center text-gray-500 dark:text-gray-400">
                                <dt class="sr-only">Warranty info:</dt>
                                <dd class="flex items-center">
                                    <button data-tooltip-target="warranty-desc-2" data-tooltip-trigger="hover" class="text-gray-400 hover:text-gray-900 dark:text-gray-500 dark:hover:text-white">
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div id="warranty-desc-2" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(982.5px, -412px, 0px);" data-popper-placement="top">
                                        This guarantee is provided by the product manufacturer.
                                        <div class="tooltip-arrow" data-popper-arrow=""></div>
                                    </div>
                                    <span class="ms-2 font-medium text-gray-900 dark:text-white">Manufacturer's warranty</span>
                                </dd>
                            </dl>
                        </div>
                        <div class="flex items-center rounded-lg bg-orange-50 px-4 py-3 text-sm text-orange-800 dark:bg-gray-700 dark:text-orange-300" role="alert">
                            <svg class="me-2 hidden h-4 w-4 flex-shrink-0 sm:flex" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>Expires on: <span class="font-medium">Sunday 30 Sep 2025</span></div>
                        </div>
                    </div>
                    <div class="mb-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="items-start justify-between border-b border-gray-100 pb-4 dark:border-gray-700 md:flex">
                            <div class="mb-4 justify-between sm:flex sm:items-center md:mb-0 md:block lg:mb-4 lg:flex xl:mb-0 xl:block">
                                <div class="items-center gap-4 sm:flex">
                                    <a href="#" class="h-14 w-14 shrink-0">
                                        <img class="h-auto max-h-64 w-full dark:hidden sm:max-h-full" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/xbox-light.svg" alt="xbox image" />
                                        <img class="hidden h-auto max-h-64 w-full dark:block sm:max-h-full" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/xbox-dark.svg" alt="xbox image" />
                                    </a>
                                    <div class="mt-4 sm:mt-0">
                                        <div class="mb-2 items-center sm:flex sm:space-x-2">
                                            <a href="#" class="mb-2 block font-semibold text-gray-900 hover:underline dark:text-white sm:mb-0 sm:flex">Xbox Series X</a>
                                            <span class="inline-flex items-center rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300">
                      <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"></path>
                      </svg>
                      Active
                    </span>
                                        </div>
                                        <a href="#" class="flex items-center font-medium text-primary-700 hover:underline dark:text-primary-500">
                                            <svg class="me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                                            </svg>
                                            Download certificate
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <button data-drawer-target="extend-warranty-drawer" data-drawer-show="extend-warranty-drawer" data-drawer-placement="right" type="button" class="w-full rounded-lg bg-primary-700 px-3 py-2 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 md:w-auto">Extend</button>
                        </div>
                        <div class="mb-4 items-center sm:flex sm:flex-wrap xl:flex">
                            <dl class="mt-4 flex items-center text-gray-500 dark:text-gray-400 sm:me-8">
                                <dt class="me-2 font-medium text-gray-900 dark:text-white">Warranty length:</dt>
                                <dd>48 months</dd>
                            </dl>
                            <dl class="mt-4 flex items-center text-gray-500 dark:text-gray-400 sm:me-8">
                                <dt class="me-2 font-medium text-gray-900 dark:text-white">Warranty type:</dt>
                                <dd>Premium</dd>
                            </dl>
                            <dl class="mt-4 flex items-center text-gray-500 dark:text-gray-400">
                                <dt class="sr-only">Warranty info:</dt>
                                <dd class="flex items-center">
                                    <button data-tooltip-target="warranty-desc-3" data-tooltip-trigger="hover" class="text-gray-400 hover:text-gray-900 dark:text-gray-500 dark:hover:text-white">
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div id="warranty-desc-3" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(982.5px, -412px, 0px);" data-popper-placement="top">
                                        This guarantee is provided by the product manufacturer.
                                        <div class="tooltip-arrow" data-popper-arrow=""></div>
                                    </div>
                                    <span class="ms-2 font-medium text-gray-900 dark:text-white">Manufacturer's warranty</span>
                                </dd>
                            </dl>
                        </div>
                        <div class="flex items-center rounded-lg bg-orange-50 px-4 py-3 text-sm text-orange-800 dark:bg-gray-700 dark:text-orange-300" role="alert">
                            <svg class="me-2 hidden h-4 w-4 flex-shrink-0 sm:flex" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>Expires on: <span class="font-medium">Monday 17 Aug 2027</span></div>
                        </div>
                    </div>
                    <div class="mb-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="items-start justify-between border-b border-gray-100 pb-4 dark:border-gray-700 md:flex">
                            <div class="mb-4 justify-between sm:flex sm:items-center md:mb-0 md:block lg:mb-4 lg:flex xl:mb-0 xl:block">
                                <div class="items-center gap-4 sm:flex">
                                    <a href="#" class="h-14 w-14 shrink-0">
                                        <img class="h-full max-h-64 w-full dark:hidden sm:max-h-full" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/ipad-light.svg" alt="ipad image" />
                                        <img class="hidden h-full max-h-64 w-full dark:block sm:max-h-full" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/ipad-dark.svg" alt="ipad image" />
                                    </a>
                                    <div class="mt-4 sm:mt-0">
                                        <div class="mb-2 items-center sm:flex sm:space-x-2">
                                            <a href="#" class="mb-2 block font-semibold text-gray-900 hover:underline dark:text-white sm:mb-0 sm:flex">Apple iPad Air PRO</a>
                                            <span class="inline-flex items-center rounded bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800 dark:bg-red-900 dark:text-red-300">
                      <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"></path>
                      </svg>
                      Cancelled
                    </span>
                                        </div>
                                        <a href="#" class="flex items-center font-medium text-primary-700 hover:underline dark:text-primary-500">
                                            <svg class="me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                                            </svg>
                                            Download certificate
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <button data-drawer-target="extend-warranty-drawer" data-drawer-show="extend-warranty-drawer" data-drawer-placement="right" type="button" class="w-full rounded-lg bg-primary-700 px-3 py-2 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 md:w-auto">Extend</button>
                        </div>
                        <div class="mb-4 items-center sm:flex sm:flex-wrap xl:flex">
                            <dl class="mt-4 flex items-center text-gray-500 dark:text-gray-400 sm:me-8">
                                <dt class="me-2 font-medium text-gray-900 dark:text-white">Warranty length:</dt>
                                <dd>48 months</dd>
                            </dl>
                            <dl class="mt-4 flex items-center text-gray-500 dark:text-gray-400 sm:me-8">
                                <dt class="me-2 font-medium text-gray-900 dark:text-white">Warranty type:</dt>
                                <dd>Premium</dd>
                            </dl>
                            <dl class="mt-4 flex items-center text-gray-500 dark:text-gray-400">
                                <dt class="sr-only">Warranty info:</dt>
                                <dd class="flex items-center">
                                    <button data-tooltip-target="warranty-desc-4" data-tooltip-trigger="hover" class="text-gray-400 hover:text-gray-900 dark:text-gray-500 dark:hover:text-white">
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div id="warranty-desc-4" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(982.5px, -412px, 0px);" data-popper-placement="top">
                                        This guarantee is provided by the product seller.
                                        <div class="tooltip-arrow" data-popper-arrow=""></div>
                                    </div>
                                    <span class="ms-2 font-medium text-gray-900 dark:text-white">Seller's warranty</span>
                                </dd>
                            </dl>
                        </div>
                        <div class="flex items-center rounded-lg bg-red-50 px-4 py-3 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <svg class="me-2 hidden h-4 w-4 flex-shrink-0 sm:flex" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>Cancelled on: <span class="font-medium">Tuesday 29 Oct 2024</span></div>
                        </div>
                    </div>
                    <div class="mb-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="items-start justify-between border-b border-gray-100 pb-4 dark:border-gray-700 md:flex">
                            <div class="mb-4 justify-between sm:flex sm:items-center md:mb-0 md:block lg:mb-4 lg:flex xl:mb-0 xl:block">
                                <div class="items-center gap-4 sm:flex">
                                    <a href="#" class="h-14 w-14 shrink-0">
                                        <img class="h-full max-h-64 w-full dark:hidden sm:max-h-full" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-light.svg" alt="watch image" />
                                        <img class="hidden h-full max-h-64 w-full dark:block sm:max-h-full" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/apple-watch-dark.svg" alt="watch image" />
                                    </a>
                                    <div class="mt-4 sm:mt-0">
                                        <div class="mb-2 items-center sm:flex sm:space-x-2">
                                            <a href="#" class="mb-2 block font-semibold text-gray-900 hover:underline dark:text-white sm:mb-0 sm:flex">Apple Watch SE</a>
                                            <span class="inline-flex items-center rounded bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                      <svg class="me-1 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                      </svg>
                      Expired
                    </span>
                                        </div>
                                        <a href="#" class="flex items-center font-medium text-primary-700 hover:underline dark:text-primary-500">
                                            <svg class="me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01" />
                                            </svg>
                                            Download certificate
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <button data-drawer-target="extend-warranty-drawer" data-drawer-show="extend-warranty-drawer" data-drawer-placement="right" type="button" class="w-full rounded-lg bg-primary-700 px-3 py-2 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 md:w-auto">Extend</button>
                        </div>
                        <div class="mb-4 items-center sm:flex sm:flex-wrap xl:flex">
                            <dl class="mt-4 flex items-center text-gray-500 dark:text-gray-400 sm:me-8">
                                <dt class="me-2 font-medium text-gray-900 dark:text-white">Warranty length:</dt>
                                <dd>24 months</dd>
                            </dl>
                            <dl class="mt-4 flex items-center text-gray-500 dark:text-gray-400 sm:me-8">
                                <dt class="me-2 font-medium text-gray-900 dark:text-white">Warranty type:</dt>
                                <dd>Standard</dd>
                            </dl>
                            <dl class="mt-4 flex items-center text-gray-500 dark:text-gray-400">
                                <dt class="sr-only">Warranty info:</dt>
                                <dd class="flex items-center">
                                    <button data-tooltip-target="warranty-desc-5" data-tooltip-trigger="hover" class="text-gray-400 hover:text-gray-900 dark:text-gray-500 dark:hover:text-white">
                                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                    <div id="warranty-desc-5" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(982.5px, -412px, 0px);" data-popper-placement="top">
                                        This guarantee is provided by the product reseller.
                                        <div class="tooltip-arrow" data-popper-arrow=""></div>
                                    </div>
                                    <span class="ms-2 font-medium text-gray-900 dark:text-white">Reseller's warranty</span>
                                </dd>
                            </dl>
                        </div>
                        <div class="flex items-center rounded-lg bg-gray-50 px-4 py-3 text-sm text-gray-800 dark:bg-gray-800 dark:text-gray-300" role="alert">
                            <svg class="me-2 hidden h-4 w-4 flex-shrink-0 sm:flex" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>Expired on: <span class="font-medium">Monday 07 Dec 2024</span></div>
                        </div>
                    </div>

                    <nav class="mt-6 flex items-center justify-center sm:mt-8" aria-label="Page navigation example">
                        <ul class="flex h-8 items-center -space-x-px text-sm">
                            <li>
                                <a href="#" class="ms-0 flex h-8 items-center justify-center rounded-s-lg border border-e-0 border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Previous</span>
                                    <svg class="h-4 w-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                            </li>
                            <li>
                                <a href="#" class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page" class="z-10 flex h-8 items-center justify-center border border-primary-300 bg-primary-50 px-3 leading-tight text-primary-600 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                            </li>
                            <li>
                                <a href="#" class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                            </li>
                            <li>
                                <a href="#" class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                            </li>
                            <li>
                                <a href="#" class="flex h-8 items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Next</span>
                                    <svg class="h-4 w-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection

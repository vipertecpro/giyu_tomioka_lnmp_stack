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
            <input type="file" name="featuredImage" class="absolute -top-96 -left-96 featuredImage -z-50" />
            <div class="relative group">
                <div class="h-full min-h-[200px] max-h-[300px] overflow-y-auto">
                    <img class="rounded-md object-contain w-full min-h-[200px] max-h-[300px] previewPlaceholder" src="" data-preview-default-url="https://placehold.co/1280x720?text=Placeholder%0A1280x720" alt="Featured Image Placeholder" />
                </div>
                <div class="absolute inset-0 flex items-end justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200 bg-gray-800 bg-opacity-20 dark:bg-gray-800 dark:bg-opacity-20 backdrop-blur-sm rounded-md">
                    <div class="flex space-x-2 mb-2">
                        <button type="button" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-md text-sm p-2 text-center items-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800 hidden" data-widget-action="edit">
                            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                            </svg>
                            <span class="sr-only">Edit Featured Image</span>
                        </button>
                        <button type="button" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm p-2 text-center items-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 inline-flex" data-widget-action="add">
                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                            </svg>
                            <span class="sr-only">Add Featured Image</span>
                        </button>
                        <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-md text-sm p-2 text-center items-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 hidden" data-widget-action="remove">
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

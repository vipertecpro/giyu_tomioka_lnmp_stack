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
            @include('restricted.layouts.widgets.categories.components.search')
            <div class="flex-grow overflow-x-auto">
                <table class="relative w-full text-sm text-left text-gray-500 dark:text-gray-400" id="widget-list">
                    <thead class="sticky block top-0 z-10 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-2">
                            <div class="flex items-center">
                                <input data-widget-action="check-all" type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="p-2 w-[400px]">Category</th>
                        <th scope="col" class="p-2 w-[400px] text-end">
                            <h5>
                                <span class="text-gray-500">Selected :</span>
                                <span class="dark:text-white" id="categories-widget-selected-categories" data-widget-action="selected-items-count"></span>
                            </h5>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="block max-h-48 overflow-y-auto" data-render-widget-list-api="{{ route('internal.widgets.categories') }}"></tbody>
                </table>
            </div>
            <div data-widget-render-pagination></div>
        </div>
    </div>
</div>

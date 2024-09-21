<div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 border-t dark:border-gray-600 flex flex-col">
    <div class="p-2 flex flex-col">
        <div class="flex-1 w-full md:max-w-sm md:mr-2">
            <label for="categories-widget-search" class="text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none"
                         stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input id="categories-widget-search" data-widget-action="search" type="search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search categories">
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-2 text-sm font-medium text-white rounded-r-md bg-gray-700 hover:bg-gray-800 focus:ring-2 focus:outline-none focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" data-widget-action="add-new">
                    Add new
                </button>
            </div>
        </div>
    </div>
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
                        <span class="dark:text-white" data-widget-action="selected-items-count"></span>
                    </h5>
                </th>
            </tr>
            </thead>
            <tbody class="block max-h-48 overflow-y-auto" data-render-widget-list-api="{{ route('internal.widgets.categories') }}"></tbody>
        </table>
    </div>
    <div data-widget-render-pagination></div>
</div>

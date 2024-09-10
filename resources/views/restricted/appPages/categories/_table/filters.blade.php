<div class="border-gray-700">
    <div class="flex flex-col-reverse md:flex-row items-center justify-between md:space-x-1 py-2">
        <div class="w-full lg:w-2/3 flex flex-col md:flex-row md:items-center">
            <div class="w-full md:max-w-sm flex-1 md:mr-2">
                <label for="default-table-search" class="text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-md bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="dataTable[search]" placeholder="Search here">
                </div>
            </div>
            <div class="flex items-center space-x-4 mt-2 md:mt-0">
                <div>
                    <button id="configurationDropdownButton" data-dropdown-toggle="configurationDropdown" type="button" class="w-full md:w-auto flex items-center justify-center p-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-md border border-primary-200 hover:bg-primary-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-primary-200 dark:focus:ring-primary-700 dark:bg-gray-800 dark:text-gray-400 dark:border-primary-600 dark:hover:text-white dark:hover:bg-gray-700" data-dropdown-offset-distance="10" data-dropdown-offset-skidding="100" >
                        <span class="pe-2">Sort By</span>
                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 20V7m0 13-4-4m4 4 4-4m4-12v13m0-13 4 4m-4-4-4 4"/>
                        </svg>
                    </button>
                    <div id="configurationDropdown" class="hidden z-10 w-48 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 border-2 border-primary-400">
                        <ul class="py-2 text-sm text-gray-800 bg-gray-100 dark:bg-gray-800 dark:text-gray-300 h-48 overflow-y-auto" aria-labelledby="configurationDropdownButton">
                            @foreach($columns as $column)
                                <li>
                                    <div class="flex items-center ps-2">
                                        <input id="filter-sort-{{ $column }}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" value="1" name="dataTable[sort][{{ $column }}]">
                                        <label for="filter-sort-{{ $column }}" class="w-full py-2 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $column }}</label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="py-1">
                            <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Reset</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

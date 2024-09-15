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

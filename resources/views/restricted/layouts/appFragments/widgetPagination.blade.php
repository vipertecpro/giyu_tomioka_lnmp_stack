@if ($paginator->hasPages())
    <nav class="flex flex-row items-center justify-between p-2" aria-label="Table navigation">
        @if ($paginator->onFirstPage())
            <div class="flex items-center space-x-2">
                <a href="javascript:void(0);" class="flex text-sm w-10 items-center justify-center h-full p-2 ml-0 text-gray-500 bg-white rounded-md border border-gray-200 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-400 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                    </svg>
                </a>
            </div>
        @else
            <div class="flex items-center space-x-2">
                <a href="javascript:void(0);" data-action-url="{{ $paginator->previousPageUrl() }}"  class="flex text-sm w-10 items-center justify-center h-full p-2 ml-0 text-gray-500 bg-white rounded-md border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white page-link">
                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                    </svg>
                </a>
            </div>
        @endif
        <div>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                <span class="font-semibold text-gray-900 dark:text-white">
                    {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}</span> of <span class="font-semibold text-gray-900 dark:text-white" data-widget-pagination-total="{{ $paginator->total() }}">{{ $paginator->total() }}
                </span>
            </span>
        </div>
        @if($paginator->hasMorePages())
            <div class="flex items-center space-x-2">
                <a href="javascript:void(0);" class="flex text-sm w-10 items-center justify-center h-full p-2 leading-tight text-gray-500 bg-white rounded-md border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white page-link" data-action-url="{{ $paginator->nextPageUrl() }}">
                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                    </svg>
                </a>
            </div>
        @else
            <div class="flex items-center space-x-2">
                <a href="javascript:void(0);" class="flex text-sm w-10 items-center justify-center h-full p-2 ml-0 text-gray-500 bg-white rounded-md border border-gray-200 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-400 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                    </svg>
                </a>
            </div>
        @endif
    </nav>
@endif

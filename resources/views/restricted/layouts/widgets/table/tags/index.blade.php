<div class="block w-full bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700" data-accordion="open">
    <h2 id="accordion-open-heading-tags">
        <button type="button" class="flex items-center justify-between w-full p-2 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-open-body-tags" aria-expanded="false" aria-controls="accordion-open-body-tags">
            <span class="flex items-center">Tags</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
        </button>
    </h2>
    <div id="accordion-open-body-tags" class="hidden" aria-labelledby="accordion-open-heading-tags" data-render-widget="tags" data-widget-source-api="{{ route('internal.widgets.append') }}" data-widget-default-values=""></div>
</div>

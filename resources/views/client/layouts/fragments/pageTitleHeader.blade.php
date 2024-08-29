@if(@$pageTitle || @$pageDescription)
    <div class="p-2 border-b border-gray-200 dark:border-gray-800">
        @if(@$pageTitle)
            <h1 class="inline-block mb-1 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white" id="content">
                {{ @$pageTitle }}
            </h1>
        @endif
        @if(@$pageDescription)
            <p class="mb-2 text-sm text-gray-600 dark:text-gray-400">
                {{ @$pageDescription }}
            </p>
        @endif
    </div>
@endif

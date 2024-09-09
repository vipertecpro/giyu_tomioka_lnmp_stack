@if(@$pageTitle || @$pageDescription)
    <div class="p-2 bg-gray-100 dark:bg-gray-800">
        @if(@$pageTitle)
            <h1 class="inline-block text-xl font-extrabold tracking-tight text-gray-900 dark:text-white" id="content">
                {{ @$pageTitle }}
            </h1>
        @endif
        @if(@$pageDescription)
            <p class="text-sm text-gray-600 dark:text-gray-400">
                {{ @$pageDescription }}
            </p>
        @endif
    </div>
    <nav class="flex p-2 text-gray-700 flex-col md:flex-row justify-between bg-gray-100 dark:bg-gray-800" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-1 rtl:space-x-reverse  py-2">
            <li class="inline-flex items-center">
                <a href="{{ route('app.dashboard.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Dashboard
                </a>
            </li>
            @foreach(@$crumbs as $crumb)
                <li class="inline-flex items-center">
                    <svg class="w-2 h-2 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="{{ $crumb['route'] }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                        {{ $crumb['title'] }}
                    </a>
                </li>
            @endforeach
        </ol>
        @if(@$actions)
            <div class="space-x-2 flex justify-end md:p-0">
                @foreach(@$actions as $action)
                    <form action="{{ $action['route'] }}" method="{{ $action['method'] }}" class="relative">
                        @csrf
                        @method($action['method'])
                            <button type="button" class="text-white bg-{{ $action['color'] }}-700 hover:bg-{{ $action['color'] }}-800 focus:ring-2 focus:outline-none focus:ring-{{ $action['color'] }}-300 font-medium rounded-md text-sm p-1 md:p-2 text-center inline-flex items-center dark:bg-{{ $action['color'] }}-600 dark:hover:bg-{{ $action['color'] }}-700 dark:focus:ring-{{ $action['color'] }}-800 formSubmit">
                            <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                            </svg>
                            {{ $action['title'] }}
                        </button>
                    </form>
                @endforeach
            </div>
        @endif
    </nav>
@endif

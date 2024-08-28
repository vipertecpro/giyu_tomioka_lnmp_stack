<header class="shadow-md">
    <nav class="bg-white border-gray-200 dark:border-gray-600 dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl px-3 md:px-6 py-2.5">
            <a href="{{ route('client.home') }}" class="flex items-center">
                <img src="{{ asset('assets/images/logo.jpg') }}" class="mr-3 h-6 sm:h-9" alt="{{ env('APP_NAME') }} Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">{{ env('APP_NAME') }}</span>
            </a>
            <div class="flex items-center">
                <div class="space-x-2">
                    <a href="{{ route('client.login') }}" class="text-sm font-medium text-primary-600 dark:text-primary-500 hover:underline">Login</a>
                    <a href="{{ route('client.register') }}" class="text-sm font-medium text-primary-700 dark:text-primary-600 hover:underline">Register</a>
                </div>
                <span class="mr-0 ml-2 w-px h-5 bg-gray-200 dark:bg-gray-600 lg:inline lg:mr-3 lg:ml-5"></span>
                <a href="#" class="inline-flex items-center p-2 text-sm font-medium text-gray-500 rounded-lg dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <svg class="w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
                </a>
                <a href="#" class="inline-flex items-center p-2 text-sm font-medium text-gray-500 rounded-lg dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <svg class="w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                </a>
                <a href="#" class="inline-flex items-center p-2 text-sm font-medium text-gray-500 rounded-lg dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z"/>
                    </svg>
                </a>
            </div>
        </div>
    </nav>
    <nav class="bg-white border-gray-200 dark:bg-gray-700 dark:border-gray-600 border-y">
        <div class="grid py-3 px-3 mx-auto max-w-screen-xl lg:grid-cols-2 md:px-6">
            <form class="flex mb-4 lg:order-2 lg:mb-0">
                <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Your Email</label>
                <button id="dropdown-button" data-dropdown-toggle="dropdown" class="hidden md:inline-flex flex-shrink-0 z-10 items-center py-2.5 px-3 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-200 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">All categories <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(897px, 5637px, 0px);">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                        <li>
                            <button type="button" class="inline-flex py-2 px-3 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mockups</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex py-2 px-3 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Templates</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex py-2 px-3 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Design</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex py-2 px-3 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logos</button>
                        </li>
                    </ul>
                </div>
                <div class="relative w-full">
                    <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg md:rounded-l-none md:border-l-gray-50 border-l-1 md:border-l-6 border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-800 dark:border-l-gray-600  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-primary-500" placeholder="Search anything..." required>
                    <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-primary-700 rounded-r-lg border border-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></button>
                </div>
            </form>
            <div class="flex items-center lg:order-1">
                <ul class="flex flex-row mt-0 space-x-8 text-sm font-medium">
                    <li>
                        <a href="{{ route('client.home') }}" class="text-gray-900 dark:text-white hover:text-primary-600 dark:hover:text-primary-500" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('client.blogs') }}" class="hidden text-gray-900 dark:text-white hover:text-primary-600 md:inline dark:hover:text-primary-500">Blogs</a>
                    </li>
                    <li>
                        <a href="{{ route('client.about') }}" class="text-gray-900 dark:text-white hover:text-primary-600 dark:hover:text-primary-500">About Us</a>
                    </li>
                    <li>
                        <a href="{{ route('client.contact') }}" class="hidden text-gray-900 dark:text-white hover:text-primary-600 md:inline dark:hover:text-primary-500">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<aside
    class="fixed top-0 left-0 z-40 w-48 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav"
    id="drawer-navigation"
>
    <div class="overflow-y-auto py-4 h-full bg-white dark:bg-gray-900">
        <ul class="space-y-1">
            <li>
                <a
                    href="{{ route('app.dashboard.index') }}"
                    class="flex items-center p-2 text-sm font-medium text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group
                    {{ request()->routeIs('app.dashboard.index') ? 'bg-gray-200 dark:bg-gray-700' : '' }}
                    "
                >
                    <svg
                        aria-hidden="true"
                        class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
        </ul>
        <h5 class="text-xs font-medium uppercase text-gray-500 dark:text-gray-300 p-1 mt-3">Configuration</h5>
        <ul class=" space-y-1">
            <li>
                <button
                    type="button"
                    class="flex items-center p-2 w-full text-sm font-medium text-gray-900  transition duration-75 group dark:text-white
                    {{ request()->routeIs('app.dashboard.users.*') ? 'bg-gray-200 dark:bg-gray-700' : '' }}
                    "
                    aria-controls="dropdown-pages"
                    data-collapse-toggle="dropdown-pages"
                    aria-expanded="{{ request()->routeIs('app.dashboard.users.*') ? 'true' : 'false' }}"
                >
                    <svg
                        aria-hidden="true"
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Users</span>
                    <svg
                        aria-hidden="true"
                        class="w-5 h-5"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                </button>
                <ul id="dropdown-pages" class="{{ !request()->routeIs('app.dashboard.users.*') ? 'hidden' : '' }} py-1 space-y-1 bg-gray-50 dark:bg-gray-900">
                    <li>
                        <a
                            href="{{ route('app.dashboard.users.create') }}"
                            class="flex items-center p-2 pl-11 w-full text-sm font-medium text-gray-900  transition duration-75 group {{ request()->routeIs('app.dashboard.users.create') ? 'text-gray-300 dark:text-gray-200 bg-gray-200 dark:bg-gray-700' : 'text-black dark:text-gray-400 text-opacity-40' }}
                            ">
                            Add New
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('app.dashboard.users.list') }}"
                            class="flex items-center p-2 pl-11 w-full text-sm font-medium text-gray-900  transition duration-75 group {{ request()->routeIs('app.dashboard.users.list') ? 'text-gray-300 dark:text-gray-200 bg-gray-200 dark:bg-gray-700' : 'text-black dark:text-gray-400 text-opacity-40' }}
                            ">
                            List
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class=" space-y-1">
            <li>
                <button
                    type="button"
                    class="flex items-center p-2 w-full text-sm font-medium text-gray-900  transition duration-75 group dark:text-white
                    {{ (request()->routeIs('app.dashboard.blogs.*') || request()->routeIs('app.dashboard.tags.*') || request()->routeIs('app.dashboard.categories.*')) ? 'bg-gray-200 dark:bg-gray-700' : '' }}
                    "
                    aria-controls="dropdown-pages-blogs"
                    data-collapse-toggle="dropdown-pages-blogs"
                    aria-expanded="{{ (request()->routeIs('app.dashboard.blogs.*') || request()->routeIs('app.dashboard.tags.*') || request()->routeIs('app.dashboard.categories.*')) ? 'true' : 'false' }}"
                >
                    <svg
                        aria-hidden="true"
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Blogs</span>
                    <svg
                        aria-hidden="true"
                        class="w-5 h-5"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                </button>
                <ul id="dropdown-pages-blogs" class="{{ !((request()->routeIs('app.dashboard.blogs.*') || request()->routeIs('app.dashboard.tags.*') || request()->routeIs('app.dashboard.categories.*'))) ? 'hidden' : '' }} py-1 space-y-1 bg-gray-50 dark:bg-gray-900">
                    <li>
                        <a
                            href="{{ route('app.dashboard.blogs.list') }}"
                            class="flex items-center p-2 pl-11 w-full text-sm font-medium text-gray-900  transition duration-75 group {{ request()->routeIs('app.dashboard.blogs.list') ? 'text-gray-300 dark:text-gray-200 bg-gray-200 dark:bg-gray-700' : 'text-black dark:text-gray-400 text-opacity-40' }}
                            ">
                            All Blogs
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('app.dashboard.blogs.create') }}"
                            class="flex items-center p-2 pl-11 w-full text-sm font-medium text-gray-900  transition duration-75 group {{ request()->routeIs('app.dashboard.blogs.create') ? 'text-gray-300 dark:text-gray-200 bg-gray-200 dark:bg-gray-700' : 'text-black dark:text-gray-400 text-opacity-40' }}
                            ">
                            Add New
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('app.dashboard.categories.list') }}"
                            class="flex items-center p-2 pl-11 w-full text-sm font-medium text-gray-900  transition duration-75 group {{ request()->routeIs('app.dashboard.categories.list') ? 'text-gray-300 dark:text-gray-200 bg-gray-200 dark:bg-gray-700' : 'text-black dark:text-gray-400 text-opacity-40' }}
                            ">
                            Categories
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('app.dashboard.tags.list') }}"
                            class="flex items-center p-2 pl-11 w-full text-sm font-medium text-gray-900  transition duration-75 group {{ request()->routeIs('app.dashboard.tags.list') ? 'text-gray-300 dark:text-gray-200 bg-gray-200 dark:bg-gray-700' : 'text-black dark:text-gray-400 text-opacity-40' }}
                            ">
                            Tags
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

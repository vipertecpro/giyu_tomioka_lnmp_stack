<form action="{{ route('app.dashboard.users.form') }}" method="POST" class="relative p-2">
    @csrf
    @method('POST')
    <input type="hidden" value="{{ @$pageData->id }}" name="id">
    <div class="grid gap-2 mb-2 sm:grid-cols-2">
        <div class="col-span-2">
            <label for="status" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Status</label>
            <select id="status" name="status" data-placeholder="Choose a status" data-allow-clear="true" title="Choose a status" style="width: 100%" >
                <option></option>
                <option value="1" {{ (string) @$pageData->status === '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ (string) @$pageData->status === '0' ? 'selected' : '' }}>In-Active</option>
            </select>
        </div>
        <div>
            <label for="full-name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
            <input type="text" name="fullName" id="full-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ @$pageData->name }}" placeholder="John Doe">
        </div>
        <div>
            <label for="email" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ @$pageData->email }}" placeholder="johndoe@gmail.com" required="">
        </div>
        <div>
            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number:</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                        <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                    </svg>
                </div>
                <input type="text" id="phone_number" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890"/>
            </div>
        </div>
        <div class="sm:col-span-2">
            <label for="current_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Address</label>
            <textarea id="current_address" rows="2" class="block p-2 w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter your current address">{{ @$pageData->current_address }}</textarea>
        </div>
        <div class="sm:col-span-2">
            <label for="present_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Present Address</label>
            <textarea id="present_address" rows="2" class="block p-2 w-full text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter your present address">{{ @$pageData->present_address }}</textarea>
        </div>
    </div>
    <div class="flex items-center space-x-2 border-t border-t-gray-300 dark:border-t-gray-700  py-2 justify-end mt-5">
        <a href="{{ route('app.dashboard.users.list') }}" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-md text-sm p-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
            Cancel
        </a>
        <button type="button" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-2 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm p-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 formSubmit">
            Submit
        </button>
    </div>
</form>

@extends('client.layouts.app')

@section('appContent')
    <section class="bg-white dark:bg-gray-900">
        <div
            class="bg-[url('https://flowbite.s3.amazonaws.com/blocks/marketing-ui/contact/laptop-human.jpg')] bg-no-repeat bg-cover bg-center bg-gray-700 bg-blend-multiply">
            <div class="max-w-screen-sm px-4 mx-auto text-center pb-72 lg:pb-80 pt-20 sm:pt-24 lg:pt-32">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">Contact Us</h2>
                <p class="mb-16 text-gray-400 sm:text-xl">We use an agile approach to test assumptions and connect with
                    the needs of your audience early and often.</p>
            </div>
        </div>

        <div class="max-w-screen-xl px-4 py-16 mx-auto -mt-96 sm:py-24">
            <form action="#" class="grid max-w-screen-md grid-cols-1 gap-6 md:gap-8 p-4 md:p-8 mx-auto mb-16 bg-white border border-gray-200 rounded-lg shadow-md lg:mb-28 dark:bg-gray-800 dark:border-gray-700 sm:grid-cols-2">
                <div>
                    <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
                        Name</label>
                    <input type="text" id="first-name"
                           class="block w-full p-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Bonnie" required>
                </div>
                <div>
                    <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                    <input type="text" id="last-name"
                           class="block w-full p-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Green" required>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                    <input type="email" id="email"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="name@flowbite.com" required>
                </div>
                <div>
                    <label for="phone-number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                        Number</label>
                    <input type="number" id="phone-number"
                           class="block w-full p-3 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="+12 345 6789" required>
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        message</label>
                    <textarea id="message" rows="6"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                              placeholder="Leave a comment..."></textarea>
                    <div class="flex mt-4">
                        <input id="default-checkbox" type="checkbox" value=""
                               class="w-4 h-4 mt-0.5 text-primary-700 bg-gray-100 border-gray-300 rounded focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ml-2 text-sm text-gray-500 dark:text-gray-400">I confirm that I have read and agree to our <a
                                class="font-normal text-gray-900 underline hover:no-underline dark:text-white" href="#">Terms of
                                Service</a> and <a class="font-normal text-gray-900 underline hover:no-underline dark:text-white"
                                                   href="#">Privacy Statement</a>.</label>
                    </div>
                </div>
                <button type="submit"
                        class="py-2.5 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Send
                    message</button>
            </form>

            <div class="space-y-8 text-center md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 lg:gap-16 md:space-y-0">
                <div>
                    <div
                        class="flex items-center justify-center w-10 h-10 mx-auto mb-4 bg-gray-100 rounded-lg dark:bg-gray-800 lg:h-16 lg:w-16">
                        <svg class="w-5 h-5 text-gray-600 lg:w-8 lg:h-8 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                    </div>
                    <p class="mb-2 text-xl font-bold dark:text-white">Email us:</p>
                    <p class="mb-3 text-gray-500 dark:text-gray-400">Email us for general queries, including marketing and
                        partnership opportunities.</p>
                    <a href="mailto:abc@example.com"
                       class="font-semibold text-primary-700 dark:text-primary-500 hover:underline">hello@flowbite.com</a>
                </div>
                <div>
                    <div
                        class="flex items-center justify-center w-10 h-10 mx-auto mb-4 bg-gray-100 rounded-lg dark:bg-gray-800 lg:h-16 lg:w-16">
                        <svg class="w-5 h-5 text-gray-600 lg:w-8 lg:h-8 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                            </path>
                        </svg>
                    </div>
                    <p class="mb-2 text-xl font-bold dark:text-white">Call us:</p>
                    <p class="mb-3 text-gray-500 dark:text-gray-400">Call us to speak to a member of our team. We are always happy
                        to help.</p>
                    <span class="font-semibold text-primary-700 dark:text-primary-500">+1 (646) 786-5060</span>
                </div>
                <div>
                    <div
                        class="flex items-center justify-center w-10 h-10 mx-auto mb-4 bg-gray-100 rounded-lg dark:bg-gray-800 lg:h-16 lg:w-16">
                        <svg class="w-5 h-5 text-gray-600 lg:w-8 lg:h-8 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <p class="mb-2 text-xl font-bold dark:text-white">Support</p>
                    <p class="mb-3 text-gray-500 dark:text-gray-400">Email us for general queries, including marketing and
                        partnership opportunities.</p>
                    <a href="#"
                       class="inline-flex px-4 py-2 text-sm font-medium text-center border rounded-lg text-primary-700 border-primary-700 hover:text-white hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:border-primary-500 dark:text-primary-500 dark:hover:text-white dark:hover:bg-primary-600 dark:focus:ring-primary-800">Support
                        center</a>
                </div>
            </div>
        </div>
    </section>
@endsection

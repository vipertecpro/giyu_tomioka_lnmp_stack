@extends('client.layouts.app')

@section('appContent')
    <div class="w-full place-self-center lg:col-span-12">
        <section class="bg-white dark:bg-gray-900 antialiased">
            <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-24">
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-20">
                    <article>
                        <a href="#" title="">
                            <img class="object-cover w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/blog-featured.png" alt="featured image">
                        </a>

                        <div class="mt-5 space-y-3">
              <span
                  class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-900 dark:text-primary-300">
                <svg aria-hidden="true" class="w-3 h-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                     fill="currentColor">
                  <path fill-rule="evenodd"
                        d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
                Programming
              </span>

                            <h2 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                                <a href="#" class="hover:underline" title="">
                                    Releasing code in large corporations is slow - and there is a good reason for it
                                </a>
                            </h2>

                            <div class="flex items-center gap-3">
                                <img class="w-8 h-8 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png" alt="">
                                <div class="text-md font-medium leading-tight text-gray-900 dark:text-white">
                                    <div>
                                        Michael Gough
                                    </div>
                                    <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                        Posted on Jan 31
                                    </div>
                                </div>
                            </div>

                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                                One of the things I always loved about the web is its immediacy. You write a piece of code, publish it
                                somewhere and
                                people can access it.
                            </p>

                            <a href="#" title=""
                               class="inline-flex items-center text-base font-semibold leading-tight text-primary-600 hover:underline dark:text-primary-500">
                                Read more
                                <svg aria-hidden="true" class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </article>

                    <div class="space-y-8">
                        <article>
                            <div class="space-y-3">
                <span
                    class="bg-indigo-100 text-indigo-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                  <svg aria-hidden="true" class="w-3 h-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                       fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                          clip-rule="evenodd" />
                  </svg>
                  Tutorial
                </span>

                                <h2 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                                    <a href="#" class="hover:underline" title="">
                                        How to rank higher on Google (6 easy steps)
                                    </a>
                                </h2>

                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                                    Static websites are now used to bootstrap lots of websites and are becoming the basis for a variety of
                                    tools that even
                                    influence both web designers and developers.
                                </p>

                                <a href="#" title=""
                                   class="inline-flex items-center text-base font-semibold leading-tight text-primary-600 hover:underline dark:text-primary-500">
                                    Read more
                                    <svg aria-hidden="true" class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article>
                            <div class="space-y-3">
                <span
                    class="bg-pink-100 text-pink-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">
                  <svg aria-hidden="true" class="w-3 h-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                       fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M7 4a3 3 0 016 0v4a3 3 0 11-6 0V4zm4 10.93A7.001 7.001 0 0017 8a1 1 0 10-2 0A5 5 0 015 8a1 1 0 00-2 0 7.001 7.001 0 006 6.93V17H6a1 1 0 100 2h8a1 1 0 100-2h-3v-2.07z"
                          clip-rule="evenodd" />
                  </svg>
                  Interview
                </span>

                                <h2 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                                    <a href="#" class="hover:underline" title="">
                                        How to schedule your tweets to send later
                                    </a>
                                </h2>

                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                                    Static websites are now used to bootstrap lots of websites and are becoming the basis for a variety of
                                    tools that even.
                                </p>

                                <a href="#" title=""
                                   class="inline-flex items-center text-base font-semibold leading-tight text-primary-600 hover:underline dark:text-primary-500">
                                    Read more
                                    <svg aria-hidden="true" class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article>
                            <div class="space-y-3">
                <span
                    class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                  <svg aria-hidden="true" class="w-3 h-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                       fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z"
                          clip-rule="evenodd" />
                  </svg>
                  Marketing
                </span>

                                <h2 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                                    <a href="#" class="hover:underline" title="">
                                        12 SEO best practices that everyone should follow
                                    </a>
                                </h2>

                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                                    Static websites are now used to bootstrap lots of websites and are becoming the basis.
                                </p>

                                <a href="#" title=""
                                   class="inline-flex items-center text-base font-semibold leading-tight text-primary-600 hover:underline dark:text-primary-500">
                                    Read more
                                    <svg aria-hidden="true" class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

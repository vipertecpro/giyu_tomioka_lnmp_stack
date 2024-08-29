@extends('client.layouts.app')

@section('appContent')
    <section class="bg-white dark:bg-gray-900 antialiased">
        <div class="grid lg:grid-cols-12">
            <div class="place-self-center w-full h-full p-4 bg-white rounded-lg shadow dark:bg-gray-800  lg:col-span-6 flex flex-col justify-evenly">
                <form class="mt-4 space-y-6 sm:mt-6" action="#">
                    <h1 class="mb-2 text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                        Forget your password ?
                    </h1>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-300">
                        Enter your email address and we will send you a link to reset your password.
                    </p>
                    <div class="grid gap-6 sm:grid-cols-1">
                        <div>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Submit</button>
                </form>
                <div class="flex flex-col xl:flex-row items-center justify-between">
                    <p class="text-sm font-light text-gray-500 dark:text-gray-300">
                        Don’t have an account? <a href="{{ route('client.register') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>.
                    </p>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-300">
                        Already have an account? <a href="{{ route('client.login') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>.
                    </p>
                </div>
            </div>
            <div class="mr-auto place-self-center lg:col-span-6 px-10">
                <img class="hidden mx-auto lg:flex rounded-lg" src="{{ asset('assets/images/forget_password.jpg') }}" alt="illustration">
            </div>
        </div>
    </section>
@endsection

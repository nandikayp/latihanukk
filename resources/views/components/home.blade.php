@extends('layout.main')
@section('content')
    <section class="bg-white mt-20 dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1
                class="text-jdl mb-4 text-4xl font-extrabold tracking-tight leading-none text-lime-950 md:text-5xl lg:text-6xl dark:text-white">
                Welcome To SevenUp Printer</h1>
            <p class=" text-prm mb-8 text-lg font-normal text-black lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Toko
                SevenUp
                menjual printer dengan kualitas yang berkualitas tinggi dengan harga terjangkau . Disini menjual barang baru
                tidak barang second </p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                @if (!Auth::check())
                    <a href="/masuk"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                        Login
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                @else
                    <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                        class="text-white bg-slate-900 hover:bg-white hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">{{ Auth::user()->email }} <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden bg-slate-700 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-50 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="{{ route('dashboard') }}"
                                    class="block px-4 py-2  dark:hover:bg-gray-600 dark:hover:text-white">Go to dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('actionlogout') }}"
                                    class="block px-4 py-2  dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                    Out</a>
                            </li>
                        </ul>
                    </div>
                @endif
                <a href="#"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Product
                </a>
            </div>
        </div>
    </section>
@endsection

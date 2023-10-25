@extends('layout.main')
@section('content')
    <div class=" mt-10 h-screen rounded-md w-full ">
        <div class="grid grid-cols-2 md:grid-cols-4 p-4 gap-5">
            @foreach ($produk as $p)
                <div
                    class="w-72 max-w-sm  bg-slate-900 border  border-gray-200 rounded-xl  shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="p-8 rounded-t-lg" src="/img/{{ $p->gambar }}" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-lg font-semibold tracking-tight text-white dark:text-white">
                                {{ $p->nama }}</h5>
                        </a>
                        <div class="flex  pt-3 items-center justify-between">
                            <span class="text-l font-bold text-white dark:text-white">Rp.{{ $p->harga }}</span>
                        </div>
                        @if (Auth::check())
                            <button type="button" data-modal-target="defaultModal{{ $p->kode }}"
                                data-modal-toggle="defaultModal{{ $p->kode }}"
                                class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Beli</button>
                        @endif
                    </div>
                </div>



                <!-- Main modal -->
                <div id="defaultModal{{ $p->kode }}" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Deskripsi
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="defaultModal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->

                            <div
                                class="max-w-sm ms-40 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                    <img class="rounded-t-lg" src="/img/{{ $p->gambar }}" alt="" />
                                </a>
                                <h5 class="text-lg mb-5 ms-4 text-slate-700">{{ $p->nama }}</h5>
                                <div class="p-5">
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Tipe : {{ $p->tipe }}
                                    </p>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Jenis :{{ $p->jenis }}
                                    </p>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Harga :
                                        Rp.{{ $p->harga }}
                                    </p>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Stok :{{ $p->stok }}
                                    </p>
                                </div>
                                <form action="/tambah-pembelian" method="POST">
                                    @csrf
                                    <input type="hidden" name="kodeproduk" value="{{ $p->kode }}">
                                    <input type="hidden" name="harga" value="{{ $p->harga }}">
                                    <div>
                                        <label for="banyak"
                                            class="block ms-3 mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Banyak</label>
                                        <input type="number" name="banyak"
                                            class="bg-gray-50 border my-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            required>
                                    </div>

                                    <div
                                        class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button data-modal-hide="defaultModal" type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Beli</button>
                                        <button data-modal-hide="defaultModal" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">cLose</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal footer -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection

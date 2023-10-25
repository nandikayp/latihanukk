@extends('layout.master')
@section('konten')
    <div class="relative w-full overflow-x-auto shadow-md sm:rounded-lg">
        @if (session('message'))
            <div class="alert alert-success m-3"> {{ session('message') }} </div>
        @endif
        <table class="w-full text-sm text-left bg-slate-800 text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
                <tr>
                    <th class="p-3">Kode Pembelian</th>
                    <th>Kode Produk</th>
                    <th class="p-2">Banyak</th>
                    <th class="p-6">Bayar</th>
                    @if (Auth::user()->role != 'Guest')
                        <th>Kode Pembeli</th>
                    @endif
                    <th class=" p-10">Status</th>
                    @if (Auth::user()->role != 'Guest')
                        <th class="p">Option</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($pembelian as $p)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $p->kode_produk }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $p->banyak }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $p->bayar }}
                        </td>
                        @if (Auth::user()->role != 'Guest')
                            <td class="px-6 py-4">
                                {{ $p->kode_pembeli }}
                            </td>
                        @endif
                        <td class="px-6 py-4">
                            @if ($p->status == 'verifikasi')
                                <button
                                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900"
                                    data-bs-toggle="modal"
                                    data-bs-target="#ModalUpdatepembelian{{ str_replace('/', '', $p->kode_pembelian) }}">
                                    {{ $p->status }}
                                </button>
                            @elseif($p->status == 'proses')
                                <button
                                    class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"
                                    data-bs-toggle="modal"
                                    data-bs-target="#ModalUpdatepembelian{{ str_replace('/', '', $p->kode_pembelian) }}">
                                    {{ $p->status }}
                                </button>
                            @elseif($p->status == 'kirim')
                                <button
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                    data-bs-toggle="modal"
                                    data-bs-target="#ModalUpdatepembelian{{ str_replace('/', '', $p->kode_pembelian) }}">
                                    {{ $p->status }}
                                </button>
                            @elseif($p->status == 'selesai')
                                <button
                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                    data-bs-toggle="modal"
                                    data-bs-target="#ModalUpdatepembelian{{ str_replace('/', '', $p->kode_pembelian) }}">
                                    {{ $p->status }}
                                </button>
                            @endif

                        </td>
                        <td>
                            @if (Auth::user()->role != 'Guest')
                        <td>
                            <form action="/pembelian/delete/{{ $p->kode_pembelian }}">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 -ms-24">Delete</button>
                            </form>

                        </td>
                @endif
                @if (Auth::user()->role != 'Guest')
                    <td>
                        <button type="button"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                            data-modal-target="update-modal{{ $p->kode_pembelian }}"
                            data-modal-toggle="update-modal{{ $p->kode_pembelian }}">Update</button>
                        <div id="update-modal{{ $p->kode_pembelian }}" tabindex="-1" aria-hidden="true"
                            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="authentication-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="px-6 py-6 lg:px-8">
                                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                            Update Pembelian</h3>
                                        <form class="space-y-6" method="POST"
                                            action="/pembelian/storeupdate/{{ $p->kode_pembelian }}">
                                            @csrf

                                            <div>
                                                <div class="form-floating p-1">
                                                    <label for="status"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                                    </label>
                                                    <select name="status"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                        <option value="verifikasi"
                                                            @if ($p->status == 'verifikasi') selected="selected" @endif>
                                                            Verifikasi
                                                        </option>
                                                        <option value="proses"
                                                            @if ($p->status == 'proses') selected="selected" @endif>
                                                            Proses
                                                        </option>
                                                        <option value="kirim"
                                                            @if ($p->status == 'kirim') selected="selected" @endif>
                                                            Kirim</option>
                                                        <option value="selesai"
                                                            @if ($p->status == 'selesai') selected="selected" @endif>
                                                            Selesai
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="modal-footer mt-3">
                                                    <button type="submit"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                                        data-bs-dismiss="modal">Save Updates</button>
                                                    <button type="submit"
                                                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Close</button>
                                                </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                @endif
                </td>
                </tr>
                @endforeach
            </tbody>

            <a href="/">
                <button type="button"
                    class="text-white mb-5 bg-slate-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Lanjutkan Pembelian
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </button>
            </a>

    </div>
    </div>

    </table>
    </div>
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto p-5">

                    <form method="post" action="{{ route('barang.update', $barang->nama) }}" class="max-w-md mx-auto">
                        @csrf
                        @method('put')

                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="nama" id="floating_name"
                            class="block py-2.5 px-0 w-full text-sm @error('nama') border-red-500 @else border-gray-300 @enderror text-gray-900 bg-transparent border-0 border-b-2  appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " autocomplete="off" value="{{ old('nama', $barang->nama) }}"/>
                            <label for="floating_name"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                                Barang</label>
                                @error('nama')
                                    <span class="text-red-400 text-xs">
                                        {{ $message }}
                                    </span>
                                @enderror
                        </div>

                        <div class="relative z-0 w-full mb-5 group">
                            <label for="kategori" class="block mb-2 text-sm text-gray-900 dark:text-slate-400">Kategori
                                Barang</label>
                            <select id="kategori" name="kategori"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->name }}" {{ $barang->kategori == $kategori->name ? 'selected' : '' }}>{{ $kategori->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="jumlah" id="floating_jumlah"
                                class="block py-2.5 px-0 w-full text-sm @error('jumlah') border-red-500 @else border-gray-300 @enderror text-gray-900 bg-transparent border-0 border-b-2 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" autocomplete="off" value="{{ old('jumlah', $barang->jumlah) }}"/>
                            <label for="floating_jumlah"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Jumlah
                                Barang</label>
                                @error('jumlah')
                                    <span class="text-red-400 text-xs">
                                        {{ $message }}
                                    </span>
                                @enderror
                        </div>

                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" name="harga" id="floating_harga"
                                class="block py-2.5 px-0 w-full text-sm @error('harga') border-red-500 @else border-gray-300 @enderror text-gray-900 bg-transparent border-0 border-b-2 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" autocomplete="off" value="{{ old('harga', $barang->harga) }}"/>
                            <label for="floating_harga"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Harga
                                Barang</label>
                                @error('harga')
                                    <span class="text-red-400 text-xs">
                                        {{ $message }}
                                    </span>
                                @enderror
                        </div>


                        <div class="relative max-w-sm mb-5">
                            <label for="datePickerId" class="block mb-2 text-sm text-gray-900 dark:text-slate-400">Tanggal Masuk</label>
                            <input id="datePickerId" type="date" name="tanggal_masuk" value="{{ $barang->tanggal_masuk }}"
                                class="bg-gray-50 border @error('tanggal_masuk') border-red-500 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Tanggal Masuk">
                                @error('tanggal_masuk')
                                    <span class="text-red-400 text-xs">
                                        {{ $message }}
                                    </span>
                                @enderror
                        </div>

                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <script>
        datePickerId.max = new Date().toISOString().split("T")[0];
    </script>
</x-app-layout>

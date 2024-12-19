<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto p-3">

                    <div class="flex justify-between mb-4">
                        <div class="text-2xl">Daftar Barang</div>
                        <a href="{{ route('barang.create') }}" class="px-3 py-2 bg-sky-400 hover:bg-sky-600 hover:text-white rounded-lg">Tambah Barang</a>
                    </div>

                    <div class="flex flex-col overflow-x-auto mb-4">
                        <div class="sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-x-auto">
                                    <table
                                        class="min-w-full text-start text-sm font-light text-surface dark:text-white">
                                        <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                                            <tr>
                                                <th scope="col" class="px-6 py-4">No</th>
                                                <th scope="col" class="px-6 py-4">Name</th>
                                                <th scope="col" class="px-6 py-4">Category</th>
                                                <th scope="col" class="px-6 py-4">Quantity</th>
                                                <th scope="col" class="px-6 py-4">Total Price</th>
                                                <th scope="col" class="px-6 py-4">Input Date</th>
                                                <th scope="col" class="px-6 py-4">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as $index => $item)
                                                <tr class="border-b border-neutral-200 dark:border-white/10 text-center">
                                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                        {{ ($items->currentPage() - 1) * $items->perPage() + $index + 1 }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4 text-justify">
                                                        {{ $item->nama }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ $item->kategori }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ number_format($item->jumlah) }} pcs
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        Rp. {{ number_format($item->harga * $item->jumlah) }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        {{ date('d M Y', strtotime($item->created_at) + 7 * 3600) }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        <a href="{{ route('barang.edit', $item->nama) }}" class="px-3 py-1.5 rounded-lg bg-green-300 hover:bg-green-500 hover:text-white">Edit</a>
                                                        <form action="{{ route('barang.destroy', $item->nama) }}" class="inline" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="px-3 py-1.5 rounded-lg bg-red-300 hover:bg-red-500 hover:text-white" onclick="return confirm('Hapus {{ $item->nama }} dari daftar barang?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{ $items->links() }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

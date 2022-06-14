<x-app-layout>
    <div class="py-6">
        <div class="mx-auto sm:px-4 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">

                    <h1 class="text-xl mb-4">Athena (Products)</h1>

                    <div class="w-1/4 mb-4">
                        <label class="sr-only" for="name">Filter</label>
                        <form method="get">
                            <input class="w-full p-3 text-sm border-gray-200 rounded-lg" placeholder="Search" value="{{ $q }}" type="text" name="q">
                        </form>
                    </div>
                    <div class="flex-col">
                        <div class="overflow-hidden overflow-x-auto border border-gray-100 rounded">
                            <table class="min-w-full text-sm divide-y divide-gray-200">
                                <thead>
                                <tr class="bg-gray-50">
                                    <th class="left-0 px-4 py-2 text-left bg-gray-50">
                                        <label class="sr-only" for="row_all">Select All</label>
                                        <input class="w-5 h-5 border-gray-200 rounded" type="checkbox" id="row_all">
                                    </th>
                                    <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Product ID</th>
                                    <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Name</th>
                                    <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Description</th>
                                    <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Product URL</th>
                                    <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Price</th>
                                    <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Image</th>
                                    <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Category</th>
                                    <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Currency</th>
                                    <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Seller Name</th>
                                    <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">Timestamp</th>
                                </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-100">

                                @forelse($products as $key => $product)
                                    <tr>
                                        <td class="left-0 px-4 py-2 bg-white">
                                            <label class="sr-only" for="row_{{ $key }}">Row {{ $key }}</label>
                                            <input class="w-5 h-5 border-gray-200 rounded" type="checkbox" id="row_{{ $key }}">
                                        </td>
                                        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">{{ $product[0] }}</td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ $product[1] }}</td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ $product[2] }}</td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ $product[3] }}</td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ $product[4] }}</td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ $product[5] }}</td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ $product[6] }}</td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ $product[7] }}</td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ $product[8]}}</td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ $product[9] }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="px-4 py-2 text-gray-700 text-center" colspan="11">No record found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

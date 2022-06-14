<x-app-layout>
    <div class="py-6">
        <div class="mx-auto sm:px-4 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">

                    <h1 class="text-xl mb-4">S3 (Files)</h1>

                    <div class="flex-col">
                        <div class="overflow-hidden overflow-x-auto border border-gray-100 rounded">
                            <table class="min-w-full text-sm divide-y divide-gray-200">
                                <thead>
                                <tr class="bg-gray-50">
                                    <th class="left-0 px-4 py-2 text-left bg-gray-50">
                                        <label class="sr-only" for="row_all">Select All</label>
                                        <input class="w-5 h-5 border-gray-200 rounded" type="checkbox" id="row_all">
                                    </th>
                                    <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">No</th>
                                    <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">File Name</th>
                                    <th class="px-4 py-2 font-medium text-left text-gray-900 whitespace-nowrap">File Path</th>
                                </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-100">

                                @forelse($files as $key => $file)
                                    <tr>
                                        <td class="left-0 px-4 py-2 bg-white">
                                            <label class="sr-only" for="row_{{ $key }}">Row {{ $key }}</label>
                                            <input class="w-5 h-5 border-gray-200 rounded" type="checkbox" id="row_{{ $key }}">
                                        </td>
                                        <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">{{ $key + 1 }}</td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ basename($file) }}</td>
                                        <td class="px-4 py-2 text-gray-700 whitespace-nowrap">{{ $file }}</td>
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

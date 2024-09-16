@if($categories->isEmpty())
    <tr class="border-b dark:border-gray-700">
        <td class="py-20 text-center text-2xl" colspan="3">No records found</td>
    </tr>
@else
    @foreach($categories as $category)
        <tr class="border-b dark:border-gray-600 block w-full">
            <td class="w-4 p-2">
                <div class="flex items-center">
                    <input id="checkbox-table-search-{{ $category->id }}" data-checkbox-item-id="{{ $category->id }}" type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" data-widget-action="check">
                    <label for="checkbox-table-search-{{ $category->id }}" class="sr-only">checkbox</label>
                </div>
            </td>
            <th colspan="2" scope="row" class="p-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <div class="flex items-center">
                    {{ $category->name }}
                </div>
            </th>
        </tr>
    @endforeach
@endif

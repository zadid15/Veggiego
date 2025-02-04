<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="w-full bg-white dark:bg-gray-800 rounded-lg border-separate" style="border-spacing: 0;">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                        <tr>
                            <th class="py-3 text-center font-medium">ID</th>
                            <th class="py-3 text-center font-medium">Name</th>
                            <th class="py-3 text-center font-medium">Price</th>
                            <th class="py-3 text-center font-medium">Stock</th>
                            <th class="py-3 text-center font-medium">Category</th>
                            <th class="py-3 text-center font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-700 dark:text-gray-300">
                        @foreach ($products as $product)
                        <tr class="transition duration-200 ease-in-out hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="py-4 text-center border-t border-gray-200 dark:border-gray-600">{{ $product->id }}</td>
                            <td class="py-4 text-center border-t border-gray-200 dark:border-gray-600">{{ $product->name }}</td>
                            <td class="py-4 text-center border-t border-gray-200 dark:border-gray-600">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="py-4 text-center border-t border-gray-200 dark:border-gray-600">{{ $product->stock }}</td>
                            <td class="py-4 text-center border-t border-gray-200 dark:border-gray-600">{{ $product->category->name ?? '-' }}</td>
                            <td class="py-4 text-center border-t border-gray-200 dark:border-gray-600 text-center">
                                <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-500">Edit</a> |
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-500" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

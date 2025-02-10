@extends("layouts.default")
@section("title", "Sunglass Hub")
@section("content")
<main class="container mx-auto px-4 py-8 bg-gray-100 min-h-screen flex flex-col justify-between">
<form action="{{ route('search') }}" method="GET" class="mb-4 flex items-center">
    <input type="search" name="search" placeholder="Search products" value="{{ request('search') }}" class="flex-1 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-200 focus:border-blue-300">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow-sm ml-2">Search</button>
</form>
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
        <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
            <a href="{{route('products.details', ['slug' => $product->slug])}}" class="block">
                <div class="aspect-w-1 aspect-h-1">
                    <img src="{{$product->image}}" alt="{{$product->title}}" class="object-cover w-full h-full">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{$product->title}}</h3>
                    <p class="text-gray-600">Rs.{{$product->price}}</p>
                </div>
            </a>
        </div>
        @endforeach
    </section>
    <div class="mt-6">
        <nav class="flex items-center justify-between" aria-label="Pagination">
            <div class="flex items-center">
                <span class="text-sm text-gray-700 mr-4">Showing <span class="font-semibold">{{ $products->firstItem() }}</span> to <span class="font-semibold">{{ $products->lastItem() }}</span> of <span class="font-semibold">{{ $products->total() }}</span> results</span>
            </div>
            <div class="flex justify-end">
                <a href="{{ $products->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                    Previous
                </a>
                <a href="{{ $products->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                    Next
                </a>
            </div>
        </nav>
    </div>
</main>
@endsection
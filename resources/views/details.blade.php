@extends("layouts.default")
@section("title", $product->title)
@section("content")
<main class="min-h-screen flex flex-col">
    <div class="bg-white p-8 rounded-lg shadow-md max-w-3xl mx-auto">
        <section class="text-gray-800">
            <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-64 object-cover mb-6 rounded-lg" alt="{{ $product->title }}">
            <h1 class="text-4xl font-bold mb-4">{{ $product->title }}</h1>
            <p class="text-2xl font-semibold mb-4 text-green-600">Rs. {{ number_format($product->price, 2) }}</p>
            <p class="mb-6 text-gray-600 leading-relaxed">{{ $product->description }}</p>
            <a href="{{ route('cart.add', $product->id) }}" class="inline-block px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">Add to Cart</a>
            @if(session()->has('success'))
            <div class="mt-6 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session()->get('success') }}
            </div>
            @endif
            @if(session()->has('error'))
            <div class="mt-6 p-4 bg-red-100 text-red-700 rounded-lg">
                {{ session()->get('error') }}
            </div>
            @endif
        </section>
    </div>
</main>
@endsection
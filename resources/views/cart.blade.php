@extends("layouts.default")
@section("title", "Cart")
@section("content")
<main class="min-h-screen flex flex-col">
    <section class="container mx-auto max-w-3xl px-4 py-8 flex-1">
        <div class="bg-white shadow-md rounded-lg p-6">
        @if(session()->has('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <p>{{ session()->get('success') }}</p>
            </div>
        @endif
        @if(session()->has('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <p>{{ session()->get('error') }}</p>
            </div>
        @endif
        <div class="space-y-4">
            @foreach ($cartItems as $cart)
                <div class="flex items-center border-b border-gray-200 py-4">
                    <div class="flex-shrink-0 w-24 h-24">
                        <img src="{{ $cart->image }}" alt="{{ $cart->title }}" class="w-full h-full object-cover rounded">
                    </div>
                    <div class="ml-4 flex-1">
                        <h3 class="text-lg font-medium text-gray-900">
                            <a href="{{ route('products.details', ['slug' => $cart->slug]) }}" class="hover:text-blue-600">{{ $cart->title }}</a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">Rs. {{ $cart->price }} | Quantity: {{ $cart->quantity }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $cartItems->links() }}
        </div>
        <div class="mt-8 flex items-center justify-between">
            <p class="text-lg font-semibold">Total: Rs. {{ $cartItems->sum('price') }}</p>
            <div class="text-center">
                <a href="{{ route('checkout.show') }}" class="inline-block px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">Checkout</a>
            </div>
        </div>
    </section>
</main>
@endsection
@extends("layouts.default")
@section("title", "Proceed to Checkout")
@section("content")
<main class="min-h-screen flex flex-col bg-gray-50">
    <div class="container mx-auto px-4 py-12">
        <section class="bg-white shadow-xl rounded-2xl p-8 max-w-3xl mx-auto border border-gray-100">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800 tracking-tight">Complete Your Order</h2>
            @if(session()->has('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-5 rounded-lg mb-6 flex items-center shadow-sm" role="alert">
                    <div class="flex items-center justify-center bg-green-100 rounded-full w-8 h-8 mr-3">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <div>
                        <p class="font-semibold text-green-700">Order Confirmed!</p>
                        <p class="text-green-600">{{ session()->get('success') }}</p>
                    </div>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="bg-red-50 border-l-4 border-red-400 p-5 rounded-lg mb-6 flex items-center shadow-sm" role="alert">
                    <div class="flex items-center justify-center bg-red-100 rounded-full w-8 h-8 mr-3">
                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </div>
                    <div>
                        <p class="font-semibold text-red-700">Error Processing Order</p>
                        <p class="text-red-600">{{ session()->get('error') }}</p>
                    </div>
                </div>
            @endif
            <form action="{{ route('checkout.post') }}" method="POST" class="space-y-8">
                @csrf
                <div class="space-y-2">
                    <label for="region" class="block text-sm font-medium text-gray-700 mb-1">
                        Region/City/District
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <input type="text" 
                               name="region" 
                               id="region" 
                               value="{{ old('region') }}" 
                               required 
                               class="pl-10 w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-shadow duration-200 shadow-sm @error('region') border-red-300 @enderror"
                               placeholder="Enter your region, city or district">
                    </div>
                    @error('region')
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                    <p class="text-sm text-gray-500">Enter your region, city or district name</p>
                </div>
                
                <div class="space-y-2">
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
                        Delivery Address
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <input type="text" 
                               name="address" 
                               id="address" 
                               value="{{ old('address') }}" 
                               minlength="10"
                               maxlength="255"
                               required 
                               class="pl-10 w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-shadow duration-200 shadow-sm @error('address') border-red-300 @enderror"
                               placeholder="Enter your complete address">
                    </div>
                    @error('address')
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                    <p class="text-sm text-gray-500">Include house/apartment number and street name</p>
                </div>

                <div class="space-y-2">
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                        Contact Phone Number
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <input type="tel" 
                               pattern="[0-9]{10}"
                               name="phone" 
                               id="phone" 
                               value="{{ old('phone') }}" 
                               placeholder="1234567890"
                               required 
                               class="pl-10 w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-shadow duration-200 shadow-sm @error('phone') border-red-300 @enderror">
                    </div>
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>


                <div class="pt-6">
                    <button type="submit" 
                            class="w-full flex items-center justify-center px-8 py-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-200 transition-all duration-200 space-x-2 font-semibold text-base">
                        <span>Proceed to Payment</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </div>
            </form>
        </section>
    </div>
</main>
@endsection





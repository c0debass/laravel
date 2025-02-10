@extends("layouts.default")
@section("title", "Contact Us")
@section("content")
<main class="container mx-auto px-4 py-8 bg-gray-100">

    <h2 class="text-2xl font-bold mb-4">Online Form</h2>

    <p class="mb-6 text-lg">You can also reach out to us by filling out the form below. We’ll get back to you as soon as possible.</p>

    <div class="border border-gray-300 p-4 rounded">
        <form class="space-y-4">
            <div class="flex flex-col">
                <label for="name" class="mb-2">Name:</label>
                <input type="text" name="name" id="name" required class="border border-gray-300 rounded p-2 w-full">
            </div>
            <div class="flex flex-col">
                <label for="email" class="mb-2">Email:</label>
                <input type="email" name="email" id="email" required class="border border-gray-300 rounded p-2 w-full">
            </div>
            <div class="flex flex-col">
                <label for="phone" class="mb-2">Phone Number (Optional):</label>
                <input type="tel" name="phone" id="phone" class="border border-gray-300 rounded p-2 w-full">
            </div>
            <div class="flex flex-col">
                <label for="message" class="mb-2">Message:</label>
                <textarea name="message" id="message" required class="border border-gray-300 rounded p-2 w-full"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
        </form>
    </div>

    <p class="mb-6 text-lg">We’d love to hear from you! Whether you have questions about our products, need help with an order, or want to share your feedback, we’re here to assist.</p>

    <h2 class="text-2xl font-bold mb-4">Get in Touch</h2>

    <ul class="space-y-2 mb-6">
        <li class="flex items-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 012.22 0L21 5.26 3 8z"></path>
            </svg>
            <a href="mailto:info@sunglasshub.com" class="ml-2 text-gray-800 hover:text-gray-900">info@sunglasshub.com</a>
        </li>
        <li class="flex items-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
            </svg>
            <a href="tel:082522123" class="ml-2 text-gray-800 hover:text-gray-900">082522123</a>
        </li>
        <li class="flex items-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <p class="ml-2 text-gray-800">
                Store Address: Tulsipur Dang, Lumbini
            </p>
        </li>
    </ul>

    <p class="mb-6 text-lg">Our team is available to assist you during <span class="font-semibold">Monday to Friday, 9 AM – 6 PM</span>.</p>

    <div class="mb-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14464.439902443987!2d83.44453285!3d27.694264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399442f38a14f501%3A0x54f5e7b2b8b3b7c5!2sTulsipur%2C+Dang!5e0!3m2!1sen!2snp!4v1569503411147!5m2!1sen!2snp" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>


    <h2 class="text-2xl font-bold mb-4">Social Media</h2>

    <p class="mb-6 text-lg">Stay connected and updated! Follow us on:</p>

    <ul class="space-y-2 mb-6">
        <li class="flex items-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 008 0v4"></path>
            </svg>
            <a href="https://www.facebook.com/sunglasshub" target="_blank" class="ml-2 text-gray-800 hover:text-gray-900">sunglasshub@facebook</a>
        </li>
        <li class="flex items-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m0 0l-6-6m6 6l6-6"></path>
            </svg>
            <a href="https://www.instagram.com/sunglasshub" target="_blank" class="ml-2 text-gray-800 hover:text-gray-900">sunglasshub@instagram</a>
        </li>
        <li class="flex items-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
            </svg>
            <a href="https://twitter.com/sunglasshub" target="_blank" class="ml-2 text-gray-800 hover:text-gray-900">sunglasshub@twitter</a>
        </li>
    </ul>

    <h2 class="text-2xl font-bold mb-4">Visit Us</h2>

    <p class="mb-6 text-lg">Prefer to shop in person? Stop by our physical store for a personal shopping experience and explore our full collection.</p>
</main>
@endsection
<footer class="bg-white shadow dark:bg-gray-800 p-4">
    <div class="container mx-auto">
        <div class="flex flex-col sm:flex-row justify-between items-center">
            <a href="#" class="flex items-center mb-4 sm:mb-0">
            <img class="h-10 w-auto bg-gray-100 dark:bg-gray-800 rounded-full p-1" src="{{ asset('assets/img/logo.jpeg') }}" alt="logo.png">
            <span class="text-xl font-semibold text-gray-800 dark:text-white">Sunglass Hub</span>
            </a>
            <ul class="flex space-x-4 text-sm text-gray-500 dark:text-gray-400">
                <li><a href="{{route("about")}}" class="hover:text-gray-700 dark:hover:text-white">About</a></li>
                <li><a href="{{route("contact")}}" class="hover:text-gray-700 dark:hover:text-white">Contact</a></li>
                <li><a href="{{route("privacy-policy")}}" class="hover:text-gray-700 dark:hover:text-white">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="mt-4 text-center text-sm text-gray-500 dark:text-gray-400">
            © 2024 <a href="#" class="hover:underline">VisionX EC</a>. All rights reserved.
        </div>
    </div>
</footer>

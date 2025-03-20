<footer class="bg-yellow-900 py-20 mt-20 text-gray-100">
    <div class="sm:grid grid-cols-3 w-4/5 pb-10 m-auto border-b-2 border-yellow-700">
        <!-- Pages Section -->
        <div>
            <h3 class="text-lg font-bold text-white uppercase">
                Explore
            </h3>
            <ul class="py-4 text-sm pt-4 text-gray-300">
                <li class="pb-1">
                    <a href="/" class="hover:text-orange-400 transition">Home</a>
                </li>
                <li class="pb-1">
                    <a href="/blogs" class="hover:text-orange-400 transition">Blog</a>
                </li>
                <li class="pb-1">
                    <a href="/about" class="hover:text-orange-400 transition">About Us</a>
                </li>
                <li class="pb-1">
                    <a href="/contact" class="hover:text-orange-400 transition">Contact</a>
                </li>
            </ul>
        </div>

        <!-- Social Media Section -->
        <div>
            <h3 class="text-lg font-bold text-white uppercase">
                Connect With Us
            </h3>
            <ul class="py-4 text-sm pt-4 text-gray-300">
                <li class="pb-1">
                    <a href="https://facebook.com" target="_blank" class="hover:text-orange-400 transition">Facebook</a>
                </li>
                <li class="pb-1">
                    <a href="https://twitter.com" target="_blank" class="hover:text-orange-400 transition">Twitter</a>
                </li>
                <li class="pb-1">
                    <a href="https://instagram.com" target="_blank" class="hover:text-orange-400 transition">Instagram</a>
                </li>
                <li class="pb-1">
                    <a href="https://youtube.com" target="_blank" class="hover:text-orange-400 transition">YouTube</a>
                </li>
            </ul>
        </div>

        <!-- Latest Blog Posts (Dynamic) -->
        <div>
            <h3 class="text-lg font-bold text-white uppercase">
                Latest Posts
            </h3>
            <ul class="py-4 text-sm pt-4 text-gray-300">
                @foreach($latestPosts as $post)
                    <li class="pb-1">
                        <a href="{{ route('blogs.show', $post->slug) }}" class="hover:text-orange-400 transition">
                            {{ $post->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Copyright Section -->
    <p class="w-4/5 pb-3 m-auto text-xs text-gray-300 pt-6 text-center">
        © {{ now()->year }} Afrobeats Blog. All Rights Reserved.
    </p>
</footer>

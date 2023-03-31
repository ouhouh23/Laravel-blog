@auth
    <x-panel>
        <div class="flex items-center">
            <img src="https://i.pravatar.cc/60?i={{ auth()->id() }}" alt="user avatar." width="40" height="40" class="rounded-full" />

            <h2 class="ml-4">Leave a comment bellow</h2>
        </div>

        <form method="POST" action="/posts/{{  $post->id }}/comments">
            @csrf

            <div class="mt-6">
                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5" placeholder="Start typing here" required></textarea>
            </div>

            @error('body')
            <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <button type="submit" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Post
                </button>
            </div>
        </form>
    </x-panel>
@else
    <p>
        <a href="/register" class="underline">Register</a>
        or
        <a href="/login" class="underline">Login</a>
        to leave a comment.
    </p>
@endauth

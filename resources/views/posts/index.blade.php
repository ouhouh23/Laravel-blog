<x-layout>
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts)
            <x-post-grid :posts="$posts"/>

            {{ $posts->links() }}
        @else
            <p class="text-bold text-center font-large">No posts available yet</p>
        @endif
    </main>
</x-layout>

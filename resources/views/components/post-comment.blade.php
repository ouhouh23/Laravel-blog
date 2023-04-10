@props(['comment'])

<x-panel class="bg-gray-100">
    <article class="flex space-x-4 mb-10" >
        <div class="flex-shrink-0">
            <img src="{{ $comment->author->avatar ? "/storage/{$comment->author->avatar}" : "https://i.pravatar.cc/60?i=[$comment->author->id]" }}"
                 alt="user avatar." width="60" height="60" class="rounded-xl"
            />
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->author->username }}</h3>

                <p class="text-xs">
                    Posted
                    <time>{{ $comment->created_at->diffForHumans() }}</time>
                </p>
            </header>

            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>

@props(['heading'])

<x-layout>
    <section class="px-6 py-8 max-w-5xl mx-auto">
        <x-panel>
            <h1 class="text-lg font-bold mb-4"> {{ $heading }} </h1>

            <div class="flex">
                <aside class="w-48">
                    <h2 class="font-semibold mb-4">
                        Links
                    </h2>

                    <ul>
                        <li>
                            <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">
                                All posts
                            </a>
                        </li>

                        <li>
                            <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">
                                New post
                            </a>
                        </li>
                    </ul>
                </aside>

                <main class="flex-1">
                    <x-panel>
                        {{ $slot }}
                    </x-panel>
                </main>
            </div>
        </x-panel>
    </section>
</x-layout>

<x-layout>
    <main class="max-w-lg mx-auto mt-6 lg:mt-20 space-y-6">
        <h1 class="text-center font-bold text-xl mb-10">Register!</h1>

        <form method="POST" action="/register">
            @csrf

            <x-form.input name="name" />

            <x-form.input name="username" />

            <x-form.input name="password" type="password" />

            <x-form.input name="email" type="email" />

            <x-form.field>
                <x-form.button>
                    Sumbit
                </x-form.button>
            </x-form.field>
        </form>
    </main>
</x-layout>

<x-layout>
    <section class="px-6 py-8 max-w-5xl mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Update your profile
        </h1>

        <form method="POST" action="/account/update" enctype="multipart/form-data">
            @csrf

            @method('PATCH')

            <x-form.input name="username" :value="$user->username" />

            <x-form.input name="avatar" type="file" :value="$user->avatar" />

            <x-form.button>
                Update Profile
            </x-form.button>
        </form>
    </section>
</x-layout>

<x-setting heading="Create a new post">
    <form method="POST" action="/admin/posts" enctype="multipart/form-data">
        @csrf

        <x-form.input name="title" />

        <x-form.textarea name="piece" />

        <x-form.textarea name="body" />

        <x-form.select name="category_id" />

        <x-form.input name="thumbnail" type="file" />

        <x-form.button>
            Publish
        </x-form.button>
    </form>
</x-setting>

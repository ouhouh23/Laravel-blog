<x-setting :heading="'Edit a post: ' . $post->title">
    <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
        @csrf

        @method('PATCH')

        <x-form.input name="title" :value="$post->title" />

        <x-form.textarea name="piece" :content="$post->piece" />

        <x-form.textarea name="body" :content="$post->piece" />

        <x-form.select name="category_id" :id="$post->category->id" />

        <x-form.input name="thumbnail" type="file" :value="$post->thumbnail" />

        <x-form.input name="author" :value="$post->author->username" />

        <x-form.radio name="status" value="published" :status="$post->status" />

        <x-form.radio name="status" value="unpublished" :status="$post->status" />

        <x-form.button>
            Update
        </x-form.button>
    </form>
</x-setting>

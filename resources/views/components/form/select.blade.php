@props(['name', 'id' => old($name)])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <select name="{{ $name }}" id="{{ $name }}>
        @foreach(\App\Models\Category::all() as $category)
            <option value="{{ $category->id }}"
                {{ $id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <x-form.error name="{{ $name }}" />
</x-form.field>

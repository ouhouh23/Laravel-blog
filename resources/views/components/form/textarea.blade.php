@props(['name', 'content' => old($name)])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <textarea class="border border-gray-400 p-2 w-full"
              name="{{ $name }}"
              id="{{ $name }}"
              required>{{ $content }}</textarea>

    <x-form.error name="{{ $name }}" />
</x-form.field>

@props(['name', 'type' => 'text', 'value' => old($name)])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <input class="border border-gray-400 p-2 w-full"
           type="{{ $type }}"
           name="{{ $name }}"
           value="{{ $value }}"
           id="{{ $name }}"
    />

    <x-form.error name="{{ $name }}" />
</x-form.field>

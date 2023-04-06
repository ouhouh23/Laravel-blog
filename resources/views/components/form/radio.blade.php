@props(['name', 'value', 'status'])

<x-form.field>
    <x-form.label name="{{ $value }}" />

    <input class="border border-gray-400 p-2 w-full"
           type="radio"
           name="{{ $name }}"
           value="{{ $value }}"
           id="{{ $value }}"
           {{ $value === $status ? 'checked' : '' }}
    />

    <x-form.error name="{{ $name }}" />
</x-form.field>

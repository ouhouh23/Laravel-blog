@props(['name', 'value'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <select name="{{ $name }}" id="{{ $name }}">
        @foreach(\App\Enums\Status::cases() as $status)
            <option value="{{ $status->value }}"
                {{ $value == $status->value ? 'selected' : '' }}
            >
                {{ $status->value }}
            </option>
        @endforeach
    </select>

    <x-form.error name="{{ $name }}" />
</x-form.field>

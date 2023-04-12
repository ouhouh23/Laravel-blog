@props(['name', 'id'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <select name="{{ $name }}" id="{{ $name }}>
        @foreach(\App\Models\User::all() as $user)
            <option value="{{ $user->id }}"
                {{ $id == $user->id ? 'selected' : '' }}>
                {{ $user->username }}
            </option>
        @endforeach
    </select>

    <x-form.error name="{{ $name }}" />
</x-form.field>

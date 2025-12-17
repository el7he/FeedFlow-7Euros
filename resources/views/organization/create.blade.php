<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Organizations') }}
        </h2>
    </x-slot>

    <div>
        <ul>
            <li><a href="{{ route('organization.create') }}">Create Organization</a></li>
        </ul>
    </div>

    <div class="py-12">
        <form method="POST" action="{{ route('organization.store') }}">
            @csrf
            <div class="mb-4">
                <input type="text" name="name" placeholder="Organization Name">
                @error('name') <div class="text-red-500">{{ $message }}</div> @enderror
            </div>
            <button type="submit">Create Organization</button>
        </form>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rename Organization') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <form method="POST" action="{{ route('organization.rename') }}">
            @csrf
            <div class="mb-4">
                <input type="text" name="name" placeholder="Organization Name">
                @error('name') <div class="text-red-500">{{ $message }}</div> @enderror
            </div>
            <button type="submit">Rename Organization</button>
        </form>
    </div>
</x-app-layout>

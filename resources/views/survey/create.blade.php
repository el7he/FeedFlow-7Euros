<x-app-layout>
    <form method="POST" action="{{ route('surveys.store') }}">
        @csrf

        <div>
            <x-input-label for="title" :value="__('Survey Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" 
            required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="description" :value="__('Survey Description')" />
            <textarea id="description" class="block mt-1 w-full" name="description" required>{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <input type="submit" value="Create Survey" class="mt-4 btn btn-primary">
</x-app-layout>

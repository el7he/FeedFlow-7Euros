<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Organizations') }}
        </h2>
    </x-slot>

    <div>
        <ul>
            <p>Liste de toutes les organisations :</p>
            @foreach($availableOrganizations as $org)
                <li>
                    <a href="{{ route('organization.join', $org) }}">{{ $org->name }} [rejoindre]</a>
                </li>
            @endforeach
        </ul>
    </div>

    <div>
        <p>Liste de toutes vos organisations :</p>
        <ul>
            @foreach($joinedOrganizations as $org)
                <li>{{ $org->name }}</li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
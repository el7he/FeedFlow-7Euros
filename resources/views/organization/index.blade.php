<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Organizations') }}
        </h2>
    </x-slot>

    <div>
        <ul>
            @if($organization)
                <p>Nom de l'organisation : {{ $organization->name }} 🙂</p>
                <a href="{{ route('organization.rename') }}">Renommer l'organisation 😆</a>
            @else
                <p>Vous n'avez pas encore d'organisation... C'est le vide, c'est le néant 🙁</p>
                <a href="{{ route('organization.create') }}">En créer une ? 😆</a>
            @endif
        </ul>
    </div>

    <div>
        <p>Liste de toutes vos organisations :</p>
        <ul>
            @foreach($organizations as $org)
                <li>{{ $org->name }}</li>
                <a href="{{ route('organization.delete', $org) }}">[supprimer l'organisation 👉🏻🗑️]</a>
            @endforeach
            <li><a href="{{ route('organization.create') }}">Create Organization</a></li>
        </ul>
    </div>
</x-app-layout>

@extends('base')

@section('title', 'Liste AVURNAV')

@section('topmenu')
    <div class="top-menu">
        <button class="btn btn-success"><a class="text-decoration-none text-white" href="{{ route('avurnav.create') }}"> Creer AVURNAV</a></button>
        <button class="btn btn-secondary"><a class="text-decoration-none text-white" href="{{ route('avurnav.index') }}"> Liste AVURNAV</a></button>
    </div>
@endsection

@section('content')
<div class="container">
    <h1>Liste des Données AVURNAV</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>AVURNAV Local</th>
                <th>Île</th>
                <th>Vous signale</th>
                <th>Position</th>
                <th>Navire</th>
                <th>POB</th>
                <th>Type</th>
                <th>Caractéristiques</th>
                <th>Zone</th>
                <th>Dernière Communication</th>
                <th>Contacts</th>
            </tr>
        </thead>
        <tbody>
            @forelse($avurnavs as $avurnav)
                <tr>
                    <td>{{ $avurnav->id }}</td>
                    <td>{{ $avurnav->avurnav_local }}</td>
                    <td>{{ $avurnav->ile }}</td>
                    <td>{{ $avurnav->vous_signale }}</td>
                    <td>{{ $avurnav->position }}</td>
                    <td>{{ $avurnav->navire }}</td>
                    <td>{{ $avurnav->pob }}</td>
                    <td>{{ $avurnav->type }}</td>
                    <td>{{ $avurnav->caracteristiques }}</td>
                    <td>{{ $avurnav->zone }}</td>
                    <td>{{ $avurnav->derniere_communication }}</td>
                    <td>{{ $avurnav->contacts }}</td>
                    <td>
                        <a href="{{ route('export.pdf', $avurnav->id) }}" class="btn btn-secondary mt-3">Exporter PDF</a>
                    </td>
                    <td>
                        <a href="{{ route('export.pdf', $avurnav->id) }}" class="btn btn-success mt-3">Voir detail</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center">Aucune donnée enregistrée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

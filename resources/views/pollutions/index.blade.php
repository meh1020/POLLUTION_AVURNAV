@extends('base')

@section('topmenu')
    <div class="top-menu">
        <button class="btn btn-success"><a class="text-decoration-none text-white" href="{{ route('pollutions.create') }}"> Creer POLLUTIONS</a></button>
        <button class="btn btn-secondary"><a class="text-decoration-none text-white" href="{{ route('pollutions.index') }}"> Liste POLLUTIONS</a></button>
    </div>
@endsection

@section('content')
    <h2>Liste des pollutions</h2>
    <a href="{{ route('pollutions.create') }}">Ajouter une pollution</a>
    
    <table border="1">
        <tr>
            <th>N°</th>
            <th>Zone</th>
            <th>Coordonnées</th>
            <th>Type</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        @foreach ($pollutions as $pollution)
        <tr>
            <td>{{ $pollution->numero }}</td>
            <td>{{ $pollution->zone }}</td>
            <td>{{ $pollution->coordonnees }}</td>
            <td>{{ $pollution->type_pollution }}</td>
            <td>@if (file_exists(public_path('storage/' . $pollution->image_satellite)))
                <img src="{{ asset('storage/' . $pollution->image_satellite) }}" width="100">
            @else
                <p>Chemin introuvable : {{ asset('storage/' . $pollution->image_satellite) }}</p>
            @endif
            </td>
            <td><a href="{{ route('pollutions.exportPDF', $pollution->id) }}">Exporter en PDF</a></td>

            <td>
                <a href="{{ route('pollutions.edit', $pollution->id) }}">Modifier</a>
                <form action="{{ route('pollutions.destroy', $pollution->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection

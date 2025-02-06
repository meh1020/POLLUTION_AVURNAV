@extends('base')

@section('title', 'Liste des Pollutions')

@section('topmenu')
    <div class="top-menu">
        <button class="btn btn-success">
            <a class="text-decoration-none text-white" href="{{ route('pollutions.create') }}">Créer POLLUTION</a>
        </button>
        <button class="btn btn-secondary">
            <a class="text-decoration-none text-white" href="{{ route('pollutions.index') }}">Liste POLLUTIONS</a>
        </button>
    </div>
@endsection

@section('content')
<div class="container">
    <h1 class="mt-4">Liste des pollutions</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered mt-4">
        <thead class="table-dark">
            <tr>
                <th>N°</th>
                <th>Zone</th>
                <th>Coordonnées</th>
                <th>Type de pollution</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pollutions as $pollution)
            <tr>
                <td>{{ $pollution->numero }}</td>
                <td>{{ $pollution->zone }}</td>
                <td>{{ $pollution->coordonnees }}</td>
                <td>{{ $pollution->type_pollution }}</td>
                <td>
                    @if ($pollution->image_satellite)
                        <img src="{{ asset('storage/' . $pollution->image_satellite) }}" width="100" class="rounded">
                    @else
                        <span class="text-muted">Aucune image</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('pollutions.exportPDF', $pollution->id) }}" class="btn btn-secondary btn-sm">Exporter PDF</a>
                        <a href="{{ route('pollutions.edit', $pollution->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('pollutions.destroy', $pollution->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette pollution ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-muted">Aucune pollution enregistrée.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
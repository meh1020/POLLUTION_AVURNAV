@extends('base')
@section('content')

@section('topmenu')
        <div class="top-menu">
            <button class="btn btn-success">
                <a class="text-decoration-none text-white" href="{{ route('sitreps.create') }}">Créer SITREP</a>
            </button>
            <button class="btn btn-secondary">
                <a class="text-decoration-none text-white" href="{{ route('sitreps.index') }}">Liste SITREP</a>
            </button>
        </div>
    @endsection
<div class="container mt-4">
    <h2>Liste des SITREPs</h2>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>SITREP SAR</th>
                <th>MRCC Madagascar</th>
                <th>Event</th>
                <th>Situation</th>
                <th>Number of Persons</th>
                <th>Assistance Required</th>
                <th>Coordinating RCC</th>
                <th>Initial Action Taken</th>
                <th>Chronology</th>
                <th>Additional Information</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sitreps as $sitrep)
                <tr>
                    <td>{{ $sitrep->id }}</td>
                    <td>{{ $sitrep->sitrep_sar }}</td>
                    <td>{{ $sitrep->mrcc_madagascar }}</td>
                    <td>{{ $sitrep->event }}</td>
                    <td>{{ $sitrep->situation }}</td>
                    <td>{{ $sitrep->number_of_persons }}</td>
                    <td>{{ $sitrep->assistance_required }}</td>
                    <td>{{ $sitrep->coordinating_rcc }}</td>
                    <td>{{ $sitrep->initial_action_taken }}</td>
                    <td>{{ $sitrep->chronology }}</td>
                    <td>{{ $sitrep->additional_information }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('sitreps.exportPDF', $sitrep->id) }}" class="btn btn-secondary btn-sm">Exporter PDF</a>
                            
                            <a href="{{ route('sitreps.edit', $sitrep->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('sitreps.destroy', $sitrep->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette pollution ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('base')

@section('topmenu')
    <div class="top-menu">
        <button class="btn btn-success"><a class="text-decoration-none text-white" href="{{ route('pollutions.create') }}"> Creer POLLUTIONS</a></button>
        <button class="btn btn-secondary"><a class="text-decoration-none text-white" href="{{ route('pollutions.index') }}"> Liste POLLUTIONS</a></button>
    </div>
@endsection

@section('content')
    <h2>Ajouter une pollution</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pollutions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="numero">Numéro :</label>
        <input type="text" id="numero" name="numero" value="{{ old('numero') }}" required>
        <br>

        <label for="zone">Zone :</label>
        <input type="text" id="zone" name="zone" value="{{ old('zone') }}" required>
        <br>

        <label for="coordonnees">Coordonnées géographiques :</label>
        <input type="text" id="coordonnees" name="coordonnees" value="{{ old('coordonnees') }}" required>
        <br>

        <label for="type_pollution">Type de pollution :</label>
        <input type="text" id="type_pollution" name="type_pollution" value="{{ old('type_pollution') }}" required>
        <br>

        <label for="image_satellite">Image satellite :</label>
        <input type="file" id="image_satellite" name="image_satellite" accept="image/*">
        <br>

        <button type="submit">Enregistrer</button>
        <a href="{{ route('pollutions.index') }}">Annuler</a>
    </form>
@endsection

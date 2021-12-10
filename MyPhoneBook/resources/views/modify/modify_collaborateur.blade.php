@extends('layouts.default')

@section('main')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>    
    <form action="{{ route('collaborateur.update', $collaborateur->id) }}" method="POST">
        @csrf    
        @method('PUT')

        Civilité :<br />
        <input type="radio" name="civilite" value="F" /> Femme
        <input type="radio" name="civilite" value="H" /> Homme
        <input type="radio" name="civilite" value="NB" /> Non-Binaire
        <br>
        <br>
        <input type="text" placeholder="Nom de famille" name="nom" value="{{ $collaborateur->nom }}">
        <br>
        <br>
        <input type="text" placeholder="Prénom" name="prenom" value="{{ $collaborateur->prenom }}">
        <br>
        <br>
        <input type="text" placeholder="Adresse" name="rue" value="{{ $collaborateur->rue }}">
        <br>
        <br>
        <input type="text" placeholder="Code Postal" name="code_postal" value="{{ $collaborateur->code_postal }}">
        <br>
        <br>
        <input type="text" placeholder="Ville" name="ville" value="{{ $collaborateur->ville }}">
        <br>
        <br>
        <input type="text" placeholder="06XXXXXXXX" name="telephone_portable" value="{{ $collaborateur->telephone_portable }}">
        <br>
        <br>
        <input type="text" placeholder="email" name="email" value="{{ $collaborateur->email }}">
        <br>
        <br>
        <input type="text" placeholder="ID de l'entreprise" name="entreprise_id" value="{{ $collaborateur->entreprise_id }}">
        <br>
        <br>
        <button>Valider</button>
    </form>
@endsection
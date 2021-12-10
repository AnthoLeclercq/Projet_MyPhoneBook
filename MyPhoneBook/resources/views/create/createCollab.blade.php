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
    <form action="{{ route('collaborateur.store') }}" method="POST">
        @csrf    

        Civilité :<br />
        <input type="radio" name="civilite" value="F" /> Femme
        <input type="radio" name="civilite" value="H" /> Homme
        <input type="radio" name="civilite" value="NB" /> Non-Binaire
        <br>
        <br>
        <input type="text" placeholder="Nom de famille" name="nom">
        <br>
        <br>
        <input type="text" placeholder="Prénom" name="prenom">
        <br>
        <br>
        <input type="text" placeholder="Adresse" name="rue">
        <br>
        <br>
        <input type="text" placeholder="Code Postal" name="code_postal">
        <br>
        <br>
        <input type="text" placeholder="Ville" name="ville">
        <br>
        <br>
        <input type="text" placeholder="Numéro de téléphone" name="telephone_portable">
        <br>
        <br>
        <input type="text" placeholder="email" name="email">
        <br>
        <br>
        <input type="text" placeholder="ID de l'entreprise" name="entreprise_id">
        <br>
        <br>
        <button>Valider</button>
    </form>
@endsection
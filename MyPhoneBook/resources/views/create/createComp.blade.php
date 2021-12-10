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
    
    <form action="{{ route('entreprise.store') }}" method="POST">
        @csrf

        <input type="text" placeholder="Nom" name="name">
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
        <button>Valider</button>
    </form>
@endsection
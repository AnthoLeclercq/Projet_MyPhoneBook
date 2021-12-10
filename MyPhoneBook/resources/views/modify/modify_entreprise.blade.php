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
    
    <form action="{{ route('entreprise.update', $entreprise->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <input type="text" placeholder="Nom" name="name" value="{{ $entreprise->name }}">
        <br>
        <br>
        <input type="text" placeholder="Adresse" name="rue" value="{{ $entreprise->rue }}">
        <br>
        <br>
        <input type="text" placeholder="Code Postal" name="code_postal" value="{{ $entreprise->code_postal }}">
        <br>
        <br>
        <input type="text" placeholder="Ville" name="ville" value="{{ $entreprise->ville }}">
        <br>
        <br>
        <input type="text" placeholder="Numéro de téléphone" name="telephone_portable" value="{{ $entreprise->telephone_portable }}">
        <br>
        <br>
        <input type="text" placeholder="email" name="email" value="{{ $entreprise->email }}">
        <br>
        <br>
        <button>Valider</button>


    </form>
    <style>
        h2{
    color: #17a2b8;
    text-align: center;
    }
    </style>
@endsection
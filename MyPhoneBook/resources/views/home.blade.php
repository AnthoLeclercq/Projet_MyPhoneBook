
@extends('layouts.app')

@extends('layouts.default')

@section('main')
    

    <h3>Liste des collaborateurs</h3>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Civilité</td>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Rue</td>
            <td>Code postal</td>
            <td>Ville</td>
            <td>Numéro de téléphone</td>
            <td>email</td>
            <td>ID de l'entreprise</td>
            <td></td>
            <td></td>
        </tr>
        @foreach($collaborateurs as $collaborateur)
        <tr>
            <td>{{$collaborateur['id']}}</td>
            <td>{{$collaborateur['civilite']}}</td>
            <td>{{$collaborateur['nom']}}</td>
            <td>{{$collaborateur['prenom']}}</td>
            <td>{{$collaborateur['rue']}}</td>
            <td>{{$collaborateur['code_postal']}}</td>
            <td>{{$collaborateur['ville']}}</td>
            <td>{{$collaborateur['telephone_portable']}}</td>
            <td>{{$collaborateur['email']}}</td>
            <td>{{$collaborateur['entreprise_id']}}</td>

            @can('update', $collaborateur)
            <td><a href="{{ route('collaborateur.edit', $collaborateur->id) }}">
                <button>edit</button>
            </a></td>
            @endcan

            @can('delete', $collaborateur)
            <td><form action="{{ route('collaborateur.destroy', $collaborateur->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" name="_method" value="delete" />
            </form></td>
            @endcan
            
        </tr>   
        @endforeach
    </table>

    <h3>Liste des entreprises</h3>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Nom</td>
            <td>Rue</td>
            <td>Code postal</td>
            <td>Ville</td>
            <td>Numéro de téléphone</td>
            <td>email</td>
            <td></td>
            <td></td>
        </tr>
        @foreach($entreprises as $entreprise)
        <tr>
            <td>{{$entreprise['id']}}</td>
            <td>{{$entreprise['name']}}</td>
            <td>{{$entreprise['rue']}}</td>
            <td>{{$entreprise['code_postal']}}</td>
            <td>{{$entreprise['ville']}}</td>
            <td>{{$entreprise['telephone_portable']}}</td>
            <td>{{$entreprise['email']}}</td>

            

            @can('update', $entreprise)  
            <td><a href="{{ route('entreprise.edit', $entreprise->id) }}">
                <button>edit</button>
            </a></td>
            @endcan
 
            @can('delete', $entreprise)
            <td><form action="{{ route('entreprise.destroy', $entreprise->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" name="_method" value="delete" />
            </form></td>
            @endcan

        </tr>   
        @endforeach
    </table>

    <br>
    <br>
    @can('create', $collaborateur)
    <form action="collaborateur/create" method="get">
        @csrf
        <input type="submit" value="Ajouter un nouveau collaborateur" />
    </form>
    @endcan

    @can('create', $entreprise)
    <form action="entreprise/create" method="get">
        @csrf
        <input type="submit" value="Ajouter une nouvelle entreprise" />
    </form>
    
    @endcan
    <style>

  
head {
    padding: 10px;
    text-align: center;
    font-size: 30px;
    border: 3px solid #17a2b8;
    background-color: #EAEAEA;
    color: #17a2b8;
  }
  #login .container #login-row #login-column #login-box #login-form {
    padding: 50px;
  }
  #login .container #login-row #login-column #login-box #login-form #register-link {
    margin-top: -5px;
  }
  h2{
    color: #17a2b8;
    text-align: center;
  }
  h3{
    color: #17a2b8;
  }
  .btn{
    background-color: #17a2b8;
    color: white;
  }
  table {
  border: 3px solid #17a2b8;
  width: 50%;
  }
  td {
  border: thin solid #17a2b8;
  width: 50%;
  background-color: #EAEAEA;
  }
    </style>
@endsection

@extends('layouts.default')

@section('main')
    

<div class= "alert">
    <h3>L'entreprise a été créée avec succès !</h3>
    <h3>Félicitation !</h3>

    <br>
    <br>
    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
</div>
    <style>
        html{
  background-color: #EAEAEA ;
}
.bod{
  margin: 150px 70px;
  height: 70vh;
  padding: 20px;
  font-size: 18px;
  color: #17a2b8;
}
.alert {
 padding: 20px;
 background-color: #17a2b8; /* Red */
 color: white;
 margin-bottom: 15px;
}

/* The close button */
.closebtn {
 margin-left: 15px;
 color: white;
 font-weight: bold;
 float: right;
 font-size: 22px;
 line-height: 20px;
 cursor: pointer;
 transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
 color: black;
}
    </style>
@endsection
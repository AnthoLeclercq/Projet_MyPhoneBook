<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @push('css-plugins')
    <link href=" {{ asset('css/default.css') }}" rel="stylesheet">
    @endpush
    <title>Document</title>
</head>
<body>
    <div class="header"><h1>My Phonebook chez PageBleue</h1></div>
    <h2>Theodore Roosevelt hulule dans les bois</h2>
    <br>
    <br>
    <main>
        @yield('main')
    </main>
</body>
</html>

<style>
.header {
    padding: 10px;
    text-align: center;
    font-size: 30px;
    border: 3px solid #17a2b8;
    background-color: #EAEAEA;
    color: #17a2b8;
}
  
  
  .h1{
    color: #17a2b8;
    text-align: center;
  }

  h2{
    color: #17a2b8;
    text-align: center;
    }
  
</style>
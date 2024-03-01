<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   

    <form action="{{route('for.store')}}" method="POST" enctype="multipart/form-data">
    
    @csrf
    
    
    <h1>Ecuacion Cuadratica</h1>
    <label>
        Ingrese Numero 1
        <br>
        <input type="number" name="a" step="any">
        <br><br>
        Ingrese Numero 2
        <br>
        <input type="number" name="b"step="any">
        <br><br>
        Ingrese Numero 3
        <br>
        <input type="number" name="c"step="any">
    </label>

    <br><br><br> 
    <button type="submit">Enviar</button>
    </form>
    
</body>
</html>
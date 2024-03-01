<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Calificaciones</h1>

    <form action="{{ route('for.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <label>
            Ingrese nombre
            <br>
            <input type="text" name="name">
        </label>
        <br><br>

        <label>
            Ingrese Nota 1
            <br>
            <input type="number" name="nota1">
            <br><br>

        </label>
        <br><br>
        <label>
            Ingrese Nota 2
            <br>
            <input type="number" name="nota2">
            <br><br>

        </label>
        <br><br>
        <label>
            Ingrese Nota 3
            <br>
            <input type="number" name="nota3">
            <br><br>

        </label>


        <br><br><br>
        <button type="submit">Enviar</button>
    </form>

</body>

</html>

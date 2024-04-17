<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Alumno</title>
</head>
<body>
    <h1>Ingresa los datos del alumno que quieras agregar</h1>
    <form action="{{route('student.add')}}" method="post">
        @csrf
        <input type="number" name="dni" placeholder="DNI">
        <input type="text" name="name" placeholder="Nombre">
        <input type="text" name="lastName" placeholder="Apellido">
        <input type="date" name="birthDate">
        <button type="submit">Agregar</button>
    </form>
    <a href="{{route('student.index')}}"><button>Volver</button></a>
</body>
</html>
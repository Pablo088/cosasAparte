<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Alumno</title>
</head>
<body>
    <h1>Aca editas al alumno</h1>
    
    <form action="{{route('student.update',$student)}}" method="post">
        @csrf
        @method("put")
        <input type="number" name="dni" value='{{$student->dni}}'>
        <input type="text" name="name" value="{{$student->name}}">
        <input type="text" name="lastName" value="{{$student->lastName}}">
        <input type="date" name="birthDate" value="{{$student->birthDate}}">
        <button type="submit">Actualizar</button>
    </form>

    <a href="{{route('student.index')}}"><button>Volver</button></a>
</body>
</html>
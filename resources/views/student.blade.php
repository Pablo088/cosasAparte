<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fium</title>
</head>
<body>
    <h1>Hola</h1>
    
       
        <div>
            <table>
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Grupo</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($student as $students)
                    <tr>
                        <th>{{$students->dni}}</th>
                        <th>{{$students->name}}</th>
                        <th>{{$students->lastName}}</th>
                        <th>{{$students->birthDate}}</th>
                        <th>{{$students->group}}</th>
                        <th><a href="{{route('student.edit',$students->id)}}"><button>Modificar</button></a></th>
                        <th><button>Eliminar</button></th>
                        <th></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
</body>
</html>
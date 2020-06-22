<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
</head>
<body>
    
    <div class="container">
        <form action="{{url('create')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            
            <br><label>UserName:</label>
            <input type="text" name="Usu_Username">
            <br><label>Email:</label>
            <input type="text" name="Usu_Email">
            <br><label>Contrasenia:</label>
            <input type="text" name="Usu_Contrasenia">
            <br><label>Imagen:</label>
            <input type="file" name="Usu_Imagen">
            <br><input type="Submit" value="Agregar">
            <a href="{{url('create')}}" >Regresar</a>
            
        </form>
    </div>

    <br>
    
</body>
</html>


        <form action="{{url('/create/'.$usuario->Usu_Id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}<!--Seguridad-->
            {{method_field('PATCH')}}

            
            <br><label>UserName:</label>
            <input type="text" name="Usu_Username" value="{{$usuario->Usu_Username}}">
            <br><label>Email:</label>
            <input type="text" name="Usu_Email" value="{{$usuario->Usu_Email}}">
            <br><label>Contrasenia:</label>
            <input type="text" name="Usu_Contrasenia" value="{{$usuario->Usu_Contrasenia}}">            
            <br><label>Foto</label><br>     
            <img src="{{ asset('storage').'/'. $usuario->Usu_Imagen}}" alt="foto" width="70px">                   
            <br><label>Imagen:</label>
            <input type="file" name="Usu_Imagen">
            <br><input type="Submit" value="Editar">
            <a href="{{url('create')}}" >Regresar</a>


        </form>

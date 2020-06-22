
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}@endif

<a href="{{url('create/create')}}" >Agregar Empleado</a>


<table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Contrasenia</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                
                <td>{{$loop->iteration}}</td>
                <td>{{$usuario->Usu_Username}}</td>
                <td>{{$usuario->Usu_Email}}</td>
                <td>{{$usuario->Usu_Contrasenia}}</td>
                <td>
                
                    <img src="{{ asset('storage').'/'. $usuario->Usu_Imagen}}" alt="foto" width="70px">  <!--se debe agregar php artisan storage:link-->                  
                </td>
                <td>
                <a href="{{url('/create/'.$usuario->Usu_Id.'/edit')}}">Editar</a>
                
                |
                
                <form method="post" action="{{url('/create/'.$usuario->Usu_Id)}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="Submit" onclick="return confirm('?Borrar?');  " > Borrar</button>
                 </form>
                 </td>
            </tr>
            @endforeach
        </tbody>
    </table>
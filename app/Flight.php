<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class flight extends Model
{
    //
    protected $table = 'usuario';
    
        /*$usua -> Usu_Username = $request ->nombre;
        $usua -> Usu_Email = $request ->email;
        $usua -> Usu_Contrasenia = $request ->contrasenia;
        $usua -> Usu_Imagen = $request ->imagen;
        $usua ->save();*/
        
    protected $fillable=["Usu_Id","Usu_Username","Usu_Email","Usu_Contrasenia","Usu_Imagen"];
    public $primaryKey = 'Usu_Id';
    public $timestamps = false;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';

}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class profesor extends Model {

    protected $table = 'profesor';

    protected $fillable = ['pro_rut',
                            'pro_nombre',
                            'pro_apellido',
                            'pro_correo',
                            'pro_clave'];

}

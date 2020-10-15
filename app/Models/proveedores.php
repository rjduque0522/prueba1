<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class proveedores extends Model
{
    protected $table = 'proveedores';
    protected $primaryKey = 'nit_pro';
    protected $filtable = ['id_pro','nit_pro','nom_pro', 'dir_pro', 'tel_pro', 'ciu_pro', 'email_pro', 'tipo_insumo'];

}
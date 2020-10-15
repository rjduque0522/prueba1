<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'nit_cli';
    protected $filtable = ['id_cli','nit_cli','nom_cli', 'dir_cli', 'tel_cli', 'ciu_cli', 'email_cli'];

}
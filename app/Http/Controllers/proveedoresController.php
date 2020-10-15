<?php

namespace App\Http\Controllers;

use App\Models\proveedores;
use Illuminate\Http\Request;

class proveedoresController extends Controller


//Listar todos los registros de proveedores
{
    public function index()

    {
        $proveedores = proveedores::all();

        if(count($proveedores)>0){
            return response()->json(['status' => 'ok', 'data' =>$proveedores, 'Mensaje' => 'Registros de proveedores']);
        }
        else{
            return response()->json(['status' => 'ok', 'data' =>array(), 'Mensaje' => 'Sin registros de proveedores']);
        }

    }


    //Obtener un registro de proveedor por id
    public function getProveedores($nit_pro)

    {
        $proveedores = proveedores::find($nit_pro);


        if($proveedores){
            return response()->json(['status' => 'ok', 'data' =>$proveedores, 'Mensaje' => 'Registro de proveedores'],200);

        }
        else{
            return response()->json(['status' => 'ok', 'data' =>array(), 'Mensaje' => 'No existe registro de ese proveedor'],200);
        }

    }


    //Registrar un proveedor 
    public function createProveedores(Request $request)
    {

        $proveedores = proveedores::find($request->nit_pro);
        if ($proveedores) {
            return response()->json(['status' => 'error', 'data' => array(), 'Mensaje' => 'Ya existe un proveedor registrado con ese NIT, vuelva a intentarlo'], 400);
        } else {

            $proveedores = new proveedores;
            $proveedores->id_pro = $request->id_pro;
            $proveedores->nit_pro = $request->nit_pro;
            $proveedores->nom_pro = $request->nom_pro;
            $proveedores->dir_pro = $request->dir_pro;
            $proveedores->tel_pro = $request->tel_pro;
            $proveedores->ciu_pro = $request->ciu_pro;
            $proveedores->email_pro = $request->email_pro;
            $proveedores->tipo_insumo = $request->tipo_insumo;
            $proveedores->save();

            if($proveedores){
            return response()->json(['status' => 'ok', 'data' =>$proveedores, 'Mensaje' => 'Registro guardado'],200);
            }
            else{
            return response()->json(['status' => 'ok', 'data' =>array(), 'Mensaje' => 'No se registro el proveedor, vuelva a intentarlo'],200);

            }
        }
    }

    //Actualizar el registro de un proveedor
    public function updateProveedores(Request $request, $nit_pro)
    {
        $proveedores = proveedores::find($nit_pro);
        $proveedores->id_pro = $request->id_pro;
        $proveedores->nit_pro = $request->nit_pro;
        $proveedores->nom_pro = $request->nom_pro;
        $proveedores->dir_pro = $request->dir_pro;
        $proveedores->tel_pro = $request->tel_pro;
        $proveedores->ciu_pro = $request->ciu_pro;
        $proveedores->email_pro = $request->email_pro;
        $proveedores->tipo_insumo = $request->tipo_insumo;
        $proveedores->save();
        if($proveedores){
            return response()->json(['status' => 'ok', 'data' =>$proveedores, 'Mensaje' => 'Registro actualizado'],200);
        }
        else{
            return response()->json(['status' => 'ok', 'data' =>array(), 'Mensaje' => 'No se actualizo el registro, vuelva a intentarlo'],200);

        }

    }


    //Eliminar un registro de proveedores
    public function destroyProveedores($nit_pro)
    {
        $proveedores = proveedores::find($nit_pro);
        $proveedores->delete();
        if($proveedores){
            return response()->json(['status' => 'ok', 'data' =>$proveedores, 'Mensaje' => 'Registro eliminado'],200);
        }
        else{
            return response()->json(['status' => 'ok', 'data' =>array(), 'Mensaje' => 'No se elimino el registro, vuelva a intentarlo'],200);
        }     
    }

}
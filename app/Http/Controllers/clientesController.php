<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;

class clientesController extends Controller


//Listar todos los registros de clientes
{
    public function index()

    {
        $clientes = clientes::all();

        if (count($clientes) > 0) {
            return response()->json(['status' => 'ok', 'data' => $clientes, 'Mensaje' => 'Registros de clientes']);
        } else {
            return response()->json(['status' => 'ok', 'data' => array(), 'Mensaje' => 'Sin registros de clientes']);
        }
    }


    //Obtener un registro de cliente por NIT
    public function getClientes($nit_cli)

    {
        $clientes = clientes::find($nit_cli);


        if ($clientes) {
            return response()->json(['status' => 'ok', 'data' => $clientes, 'Mensaje' => 'Registro de cliente NIT: ' . $nit_cli], 200);
        } else {
            return response()->json(['status' => 'ok', 'data' => array(), 'Mensaje' => 'No existe registro de ese cliente con el NIT' . $nit_cli], 200);
        }
    }


    //Registrar un cliente
    public function createClientes(Request $request)
    {

        $clientes = clientes::find($request->nit_cli);
        if ($clientes) {
            return response()->json(['status' => 'error', 'data' => array(), 'Mensaje' => 'Ya existe un cliente registrado con ese NIT, vuelva a intentarlo'], 400);
        } else {

            $clientes = new clientes;
            $clientes->id_cli = $request->id_cli;
            $clientes->nit_cli = $request->nit_cli;
            $clientes->nom_cli = $request->nom_cli;
            $clientes->dir_cli = $request->dir_cli;
            $clientes->tel_cli = $request->tel_cli;
            $clientes->ciu_cli = $request->ciu_cli;
            $clientes->email_cli = $request->email_cli;
            $clientes->save();

            if ($clientes) {
                return response()->json(['status' => 'ok', 'data' => $clientes, 'Mensaje' => 'Registro guardado'], 200);
            } else {
                return response()->json(['status' => 'ok', 'data' => array(), 'Mensaje' => 'No se registro el cliente, vuelva a intentarlo'], 200);
            }
        }
    }


    //Actualizar un registro de clientes
    public function updateClientes(Request $request, $nit_cli)
    {
        $clientes = clientes::find($nit_cli);
        $clientes->id_cli = $request->id_cli;
        $clientes->nit_cli = $request->nit_cli;
        $clientes->nom_cli = $request->nom_cli;
        $clientes->dir_cli = $request->dir_cli;
        $clientes->tel_cli = $request->tel_cli;
        $clientes->ciu_cli = $request->ciu_cli;
        $clientes->email_cli = $request->email_cli;

        $clientes->save();
        if ($clientes) {
            return response()->json(['status' => 'ok', 'data' => $clientes, 'Mensaje' => 'Registro actualizado'], 200);
        } else {
            return response()->json(['status' => 'ok', 'data' => array(), 'Mensaje' => 'No se actualizo el registro, vuelva a intentarlo'], 200);
        }
    }


    //Eliminar un registro de clientes
    public function destroyClientes($nit_cli)
    {
        $clientes = clientes::find($nit_cli);
        $clientes->delete();
        if ($clientes) {
            return response()->json(['status' => 'ok', 'data' => $clientes, 'Mensaje' => 'Registro eliminado'], 200);
        } else {
            return response()->json(['status' => 'ok', 'data' => array(), 'Mensaje' => 'No se elimino el registro, vuelva a intentarlo'], 200);
        }
    }


    //Buscador de clientes por el nombre
    public function searchClientes($nom_cli)
    {
        $clientes = clientes::all()->where("nom_cli", $nom_cli);

        if (count($clientes) > 0) {
            return response()->json(['status' => 'ok', 'data' => $clientes, 'Mensaje' => 'Registros de cliente con el nombre: ' . $nom_cli]);
        } else {
            return response()->json(['status' => 'ok', 'data' => array(), 'Mensaje' => 'no se encontraron clientes con ese nombre']);
        }
    }
}

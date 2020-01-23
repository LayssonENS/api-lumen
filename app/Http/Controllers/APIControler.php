<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Client;

class APIControler extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    public function ListaUsuarios()
    {

        $json = [
            'usuario' => [
                'nome' => 'Laysson',
                'idade' => 21
            ],
            'usuario2' => [
                'nome' => 'Laiza',
                'idade' => 23
            ]
        ];

        return response($json, 201)
            ->header('Content-Type', 'application/json');
    }

    public function ListaClientes()
    {
        $clientes = Clientes::all();
        return response($clientes, 201)
            ->header('Content-Type', 'application/json');
    }

    public function ListaCliente($id)
    {
        $clientes = Clientes::find($id);
        return response($clientes, 201)
            ->header('Content-Type', 'application/json');
    }

    public function CadastraCliente(Request $data)
    {
        $clientes = Clientes::create([
            'nome' => $data->nome,
            'cnpj' => $data->cnpj
        ]);
        return response($clientes, 201)
            ->header('Content-Type', 'application/json');
    }

    public function DeleteCliente($id)
    {
        $clientes = Clientes::find($id);
        $clientes->delete();
        return response($clientes, 201)
            ->header('Content-Type', 'application/json');
    }

    public function AlteraCliente(Request $data)
    {
        $clientes = Clientes::find($data->id);

        $clientes->nome = $data->nome;
        $clientes->cnpj = $data->cnpj;
        $clientes->save();

        return response($clientes, 201)
            ->header('Content-Type', 'application/json');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Utils\ValidacaoCPF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $cpf_validator = new ValidacaoCPF();
        $resp_cpf_validator = $cpf_validator->checkValidCPF($request->get('cpf'));

        $validator = Validator::make($request->all(),[
            'nome' => 'required|string',
            'telefone' => 'required|string',
            'cpf' => 'required|string',
            'placa_carro' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json([
                "error" => 'Preencha os campos corretamente!',
                "message" => $validator->errors(),
            ], 404);
        }
        
        if (!$resp_cpf_validator) {
            return response()->json([
                "message" => 'CPF digitado inválido'
            ], 404);
        }

        if (Cliente::create($request->all())) {
            return response()->json([
                'message' => 'Cliente cadastrado com sucesso!'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao cadastrar cliente!'
        ], 404); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            return $cliente;
        }

        return response()->json([
            'message' => 'Erro ao buscar cliente!'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->update($request->all());
            return $cliente;
        }

        return response()->json([
            'message' => 'Erro ao atualizar cliente!'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Cliente::destroy($id)) {
            return response()->json([
                'message' => 'Cliente excluído com sucesso!'
            ], 201);
        }

        return response()->json([
            'message' => 'Erro ao excluir cliente!'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $numero
     * @return \Illuminate\Http\Response
     */
    public function show_placa($numero)
    {   
        $orders = DB::table('clientes')
                ->whereRaw('(RIGHT(placa_carro, 1) = ?)', $numero)
                ->get();
        return $orders;
    }
}
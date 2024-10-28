<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
     // Listar todos os vendedores
     public function listar()
     {
         $vendedor = Vendedor::all();
         return response()->json($vendedor);
     }
 
     // Criar um novo vendedor
     public function salvar(Request $request)
     {
         $validatedData = $request->validate([
             'nome' => 'required|string|max:200',
             'anoNascimento' => 'required|integer',
             'cpf' => 'required|string|max:15',
         ]);
 
         $vendedor = vendedor::create($validatedData);
         return response()->json($vendedor, 201);
     }
 
     // Listar vendedor por ID
     public function listarPeloId($id)
     {
         $vendedor = Vendedor::findOrFail($id);
         return response()->json($vendedor);
     }
 
     // Editar um Vendedor
     public function editar(Request $request, $id)
     {
         $validatedData = $request->validate([
             'nome' => 'string|max:200',
             'anoNascimento' => 'integer',
             'cpf' => 'string|max:15',
         ]);
 
         $vendedor = Vendedor::findOrFail($id);
         $vendedor->update($validatedData);
 
         return response()->json($vendedor);
     }
 
     // Remover um vendedor
     public function excluir(int $id)
     {
         $vendedor = Vendedor::findOrFail($id);
         $vendedor->delete();
 
         return response("Vendedor excluido!");
     }
}

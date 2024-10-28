<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Vendedor;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
      // Listar todos os Produtos
      public function listar()
      {
          $produto = Produto::all();
          return response()->json($produto);
      }
  
      // Criar um novo Produto
      public function salvar(Request $request)
      {
          $validatedData = $request->validate([
              'nome' => 'required|string|max:200',
              'preco' => 'required|integer',
          ]);
  
          $produto = Produto::create($validatedData);
          return response()->json($produto, 201);
      }
  
      // Listar Produto por ID
      public function listarPeloId($id)
      {
          $produto = Produto::findOrFail($id);
          return response()->json($produto);
      }
  
      // Editar um Produto
      public function editar(Request $request, $id)
      {
          $validatedData = $request->validate([
              'nome' => 'string|max:200',
              'preco' => 'integer',
              
          ]);
  
          $produto = Produto::findOrFail($id);
          $produto->update($validatedData);
  
          return response()->json($produto);
      }
  
      // Remover um Produto
      public function excluir(int $id)
      {
          $produto = Produto::findOrFail($id);
          $produto->delete();
  
          return response("Produto excluido!");
      }
}

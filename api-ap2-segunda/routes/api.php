<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\VendedorControllerController;
use App\Models\Produto;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/produto', [ProdutoController::class, "index"]); // Listar todos os Produtos
Route::post('/produto', [ProdutoController::class, 'salvar']);          // salvar um Produto
Route::get('/produto/{id}', [ProdutoController::class, 'listarPeloId']);       // Listar produto por ID
Route::put('/produto/{id}', [ProdutoController::class, 'editar']);     // Editar um filme
Route::delete('/produto/{id}', [ProdutoController::class, 'excluir']); // Remover um produto


Route::get('/vendedor', [VendedorController::class, "index"]); // Listar todos os Vendedores
Route::post('/vendedor', [VendedorController::class, 'salvar']);          // salvar um vendedor
Route::get('/vendedor/{id}', [VendedorController::class, 'listarPeloId']);       // Listar produto por ID
Route::put('/vendedor/{id}', [VendedorController::class, 'editar']);     // Editar um Vendedor
Route::delete('/vendedor/{id}', [VendedorController::class, 'excluir']); // Remover um Vendedor




<?php

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    "prefix" => "medicines"
], function () {
    Route::get('/', function (){
        return response()->json([]);
    })->name('medicines.index');

    Route::post('/', function (Request $request){
        return response()->json(array_merge($request->all(), ['id' => 1]));
    })->name('medicines.store');

    Route::get('{id}', function ($id){
        return response()->json(['id' => $id]);
    })->name('medicines.show');

    Route::put('{id}', function (Request $request, $id){
        return response()->json(array_merge($request->all(), ['updated' => true, 'id' => $id]));
    })->name('medicines.update');

    Route::delete('{id}', function ($id){
        return response()->json(['deleted' => true, 'id' => $id]);
    })->name('medicines.destroy');
});

Route::group([
    "prefix" => "manufacturers"
], function () {
    Route::get('/', function (){
        return response()->json([]);
    })->name('manufacturers.index'); //Listar

    Route::post('/', function (){
        return response()->json(['id' => 1]);
    })->name('manufacturers.store'); //Criar

    Route::get('{id}', function ($id){
        return response()->json(['id' => $id]);
    })->name('manufacturers.show'); //Detalhes

    Route::put('{id}', function ($id){
        return response()->json(['updated' => true, 'id' => $id]);
    })->name('manufacturers.update'); //Atualizar

    Route::delete('{id}', function ($id){
        return response()->json(['deleted' => true, 'id' => $id]);
    })->name('manufacturers.destroy'); //Deletar
});

Route::group([
    "prefix" => "categories"
], function () {
    Route::get('/', function (){
        return response()->json([]);
    })->name('categories.index'); //Listar

    Route::post('/', function (){
        return response()->json(['id' => 1]);
    })->name('categories.store'); //Criar

    Route::get('{id}', function ($id){
        return response()->json(['id' => $id]);
    })->name('categories.show'); //Detalhes

    Route::put('{id}', function ($id){
        return response()->json(['updated' => true, 'id' => $id]);
    })->name('categories.update'); //Atualizar

    Route::delete('{id}', function ($id){
        return response()->json(['deleted' => true, 'id' => $id]);
    })->name('categories.destroy'); //Deletar
});

Route::group([
    "prefix" => "addresses"
], function () {
    Route::get('/', function (){
        return response()->json([]);
    })->name('addresses.index'); //Listar

    Route::post('/', function (){
        return response()->json(['id' => 1]);
    })->name('addresses.store'); //Criar

    Route::get('{id}', function ($id){
        return response()->json(['id' => $id]);
    })->name('addresses.show'); //Detalhes

    Route::put('{id}', function ($id){
        return response()->json(['updated' => true, 'id' => $id]);
    })->name('addresses.update'); //Atualizar

    Route::delete('{id}', function ($id){
        return response()->json(['deleted' => true, 'id' => $id]);
    })->name('addresses.destroy'); //Deletar
});

Route::group([
    "prefix" => "active-ingredients"
], function () {
    Route::get('/', function (){
        return response()->json([]);
    })->name('ingredients.index'); //Listar

    Route::post('/', function (){
        return response()->json(['id' => 1]);
    })->name('ingredients.store'); //Criar

    Route::get('{id}', function ($id){
        return response()->json(['id' => $id]);
    })->name('ingredients.show'); //Detalhes

    Route::put('{id}', function ($id){
        return response()->json(['updated' => true, 'id' => $id]);
    })->name('ingredients.update'); //Atualizar

    Route::delete('{id}', function ($id){
        return response()->json(['deleted' => true, 'id' => $id]);
    })->name('ingredients.destroy'); //Deletar
});

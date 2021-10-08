<?php

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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
        $medicines = Medicine::paginate(5);
        if($medicines){
            return response()->json($medicines);
        }else{
            return response()->json(['message' => 'Not Found!'], 404);
        }
    })->name('medicines.index');

    Route::post('/', function (Request $request){
        $validator = Validator::make($request->all(), [
            'active_ingredient_id' => 'required|integer',
            'manufacturer_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'short_name' => 'required|string|max:150',
            'slug' => 'required|string|max:150',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 404);
        }
        $medicine = new Medicine();
        $medicine->active_ingredient_id = $request->active_ingredient_id;
        $medicine->manufacturer_id = $request->manufacturer_id;
        $medicine->name = $request->name;
        $medicine->short_name = $request->short_name;
        $medicine->slug = $request->slug;
        $medicine->save();
        return response()->json($medicine);
    })->name('medicines.store');

    Route::get('{id}', function ($id){
        $medicine = Medicine::with('manufacturer', 'active_ingredient', 'categories', 'attachments', 'descriptions', 'metas')->find($id);
        if($medicine){
            return response()->json($medicine);
        }else{
            return response()->json(['message' => 'Not Found!'], 404);
        }
    })->name('medicines.show');

    Route::put('{id}', function (Request $request, $id){
        $medicine = Medicine::find($id);
        if($medicine) {
            $validator = Validator::make($request->all(), [
                'active_ingredient_id' => 'required|integer',
                'manufacturer_id' => 'required|integer',
                'name' => 'required|string|max:255',
                'short_name' => 'required|string|max:150',
                'slug' => 'required|string|max:150',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 404);
            }
            $medicine->active_ingredient_id = $request->active_ingredient_id;
            $medicine->manufacturer_id = $request->manufacturer_id;
            $medicine->name = $request->name;
            $medicine->short_name = $request->short_name;
            $medicine->slug = $request->slug;
            $medicine->save();
            return response()->json(array_merge($request->all(), ['updated' => true]));
        }else{
            return response()->json(['message' => 'Not Found!'], 404);
        }
    })->name('medicines.update');

    Route::delete('{id}', function ($id){
        $medicine = Medicine::find($id);
        if($medicine){
            $medicine->delete();
            return response()->json(['deleted' => true]);
        }else{
            return response()->json(['message' => 'Not Found!'], 404);
        }
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

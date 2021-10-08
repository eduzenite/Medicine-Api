<?php

use App\Http\Controllers\Api\{ManufacturerController, MedicineController, CategoryController, AddressController, ActiveIngredientController};
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
    Route::get('/', [MedicineController::class, 'index'])->name('medicines.index');
    Route::post('/', [MedicineController::class, 'store'])->name('medicines.store');
    Route::get('{id}', [MedicineController::class, 'show'])->name('medicines.show');
    Route::put('{id}', [MedicineController::class, 'update'])->name('medicines.update');
    Route::delete('{id}', [MedicineController::class, 'destroy'])->name('medicines.destroy');
});

Route::group([
    "prefix" => "manufacturers"
], function () {
    Route::get('/', [ManufacturerController::class, 'index'])->name('manufacturers.index'); //Listar
    Route::post('/', [ManufacturerController::class, 'store'])->name('manufacturers.store'); //Criar
    Route::get('{id}', [ManufacturerController::class, 'show'])->name('manufacturers.show'); //Detalhes
    Route::put('{id}', [ManufacturerController::class, 'update'])->name('manufacturers.update'); //Atualizar
    Route::delete('{id}', [ManufacturerController::class, 'destroy'])->name('manufacturers.destroy'); //Deletar
});

Route::group([
    "prefix" => "categories"
], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index'); //Listar
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store'); //Criar
    Route::get('{id}', [CategoryController::class, 'show'])->name('categories.show'); //Detalhes
    Route::put('{id}', [CategoryController::class, 'update'])->name('categories.update'); //Atualizar
    Route::delete('{id}', [CategoryController::class, 'destroy'])->name('categories.destroy'); //Deletar
});

Route::group([
    "prefix" => "addresses"
], function () {
    Route::get('/', [AddressController::class, 'index'])->name('addresses.index'); //Listar
    Route::post('/', [AddressController::class, 'store'])->name('addresses.store'); //Criar
    Route::get('{id}', [AddressController::class, 'show'])->name('addresses.show'); //Detalhes
    Route::put('{id}', [AddressController::class, 'update'])->name('addresses.update'); //Atualizar
    Route::delete('{id}', [AddressController::class, 'destroy'])->name('addresses.destroy'); //Deletar
});

Route::group([
    "prefix" => "active-ingredients"
], function () {
    Route::get('/', [ActiveIngredientController::class, 'index'])->name('ingredients.index'); //Listar
    Route::post('/', [ActiveIngredientController::class, 'store'])->name('ingredients.store'); //Criar
    Route::get('{id}', [ActiveIngredientController::class, 'show'])->name('ingredients.show'); //Detalhes
    Route::put('{id}', [ActiveIngredientController::class, 'update'])->name('ingredients.update'); //Atualizar
    Route::delete('{id}', [ActiveIngredientController::class, 'destroy'])->name('ingredients.destroy'); //Deletar
});

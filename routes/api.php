<?php

use App\Http\Controllers\Api\ProductCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
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
Route::get('categories', [ProductCategoryController::class, 'index']);
Route::get('image/{id}', function ($id) {
    return Http::withHeaders([
        'Authorization' => 'Bearer ' . Config::get('services.packt_token')
    ])->get("https://api.packt.com/api/v1/products/$id/cover/large");
});

Route::get('get-cover/{title}/{author}', function ($title,$author) {
    $image = Http::get("https://bookcoverapi.herokuapp.com/bookcover?book_title=$title&author_name=$author");
    echo "<pre>";
    print_r($image->body());
    echo "<pre>";
    die();
});

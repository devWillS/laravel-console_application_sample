<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/no_args', function () {
    Artisan::call('no-args-command');
});

Route::get('/with_args', function () {
    Artisan::call('with-args-command', [
        'name' => 'Johann',
        '--switch' => true,
    ]);
    // Artisan::call('with-args-command Johann --switch');
});

Route::post('/import-orders', function (Request $request) {
    $json = $request->getContent();
    file_put_contents('/tmp/orders', $json);

    return response('ok');
});

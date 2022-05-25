<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PostController;
use Pusher\PushNotifications\PushNotifications;

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


Route::post('/post', 'PostController@store');
Route::get('/send_notification',  [PostController::class, 'send_notification']);
Route::get('/subscirbe_notify',  [PostController::class, 'subscirbe_notify']);


Route::get('beams-auth', function (Request $request) {

    $beamsClient = new PushNotifications(array(
        "instanceId" => "cd0a708f-6550-417d-b4b8-c1ea5eb4caf8",
        "secretKey" => "9E817824081B333C36BDC6023A5490521CAE91B112520050C9DD3E792AFDB8B7",
      ));

    $userID = "11"; // If you use a different auth system, do your checks here
    $userIDInQueryParam = $request->user_id;

    if ($userID != $userIDInQueryParam) {
        return response('Inconsistent request', 401);
    } else {
        $beamsToken = $beamsClient->generateToken($userID);
        return response()->json($beamsToken);
    }
});



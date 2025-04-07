<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\Api\VehicleController;
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



Route::group(['middleware' => ['cors', 'json.response']], function () {
     // public routes
    Route::post('login', [ApiAuthController::class,'login']);
    Route::post('register',[ApiAuthController::class,'agentRegister']);
    // Route::post('logout', [ApiAuthController::class,'logout']);
    // Route::get('/articles', [ArticleController::class,'index']);
    Route::get('admin-list',[ApiAuthController::class,'Admin']);
    
});


Route::middleware('auth:api')->group(function () {
    //Agent Account Routes
    Route::get('my-profile',[ApiAuthController::class,'profile']);
    Route::post('profile_update',[ApiAuthController::class,'profileUpdate']);
    Route::post('password_change',[ApiAuthController::class,'passwordChange']);
    Route::get('logout',[ApiAuthController::class,'logout']);

    //Vehicle Routes
    Route::get('vehicle_list', [VehicleController::class,'allVehicle']);
    Route::post('search-vehicle', [vehicleController::class,'searchVehicle']);
    Route::get('user-status',[ApiAuthController::class,'userStatus']);
    // Route::get('/view-vehicle/{id}', [vehicleController::class,'viewVehicle']);
    Route::post('view-vehicle', [vehicleController::class,'viewVehicle']);
    
    //Letter Routes
    Route::get('letter', [vehicleController::class,'letter']);
    Route::get('letter-list', [vehicleController::class,'letterList']);
    Route::post('requestLetter', [vehicleController::class,'requestLetter']);
    
    // //home api
    // Route::get('homepage',[HomePageController::class,'home']);
    // Route::get('viewed-link/{id}',[HomePageController::class,'viewedLink']);
    
    // //business contact
    // Route::get('app_version',[settingController::class,'appVersion']);
    // Route::get('rules',[settingController::class,'rules']);
});



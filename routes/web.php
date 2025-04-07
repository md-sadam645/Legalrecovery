<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\FileRecordController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\SearchHistoryController;
use App\Http\Controllers\SharedFileRecordController;
use App\Http\Controllers\LetterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//AUTH ROUTES STARTS
// Route::get('/login',[LoginController::class,'adminlogin']);

Route::post('adminAuth',[LoginController::class,'authAdmin']);

Route::get('delete-account',[LoginController::class,'deleteAccount']);
Route::get('deletemyaccount',[LoginController::class,'deletemyaccount']);



// Route::get('/unauthorized_access',[LoginController::class,'unauthorized']);

//AUTH ROUTES ENDS


//ADMIN ROUTES STARTS
Route::group(['middleware'=>['IsSuperAdmin']],function()
{
    //Admin LEADER ROUTES 
    Route::get('admin/add',[AdminController::class,'add']);
    Route::post('admin/save',[AdminController::class,'save']);
    Route::get('admin/list',[AdminController::class,'view']);
    Route::get('admin/edit/{id}',[AdminController::class,'edit']);
    Route::post('admin/update/{id}',[AdminController::class,'update']);
    Route::get('admin/delete/{id}',[AdminController::class,'destroy']);
    Route::post('search-admin',[AdminController::class,'searchAdmin']);
    
    //Search history
    Route::get('search-history/delete/{id}',[SearchHistoryController::class,'destroy']);
    Route::get('search-history/delete_all',[SearchHistoryController::class,'destroyall']);

});
//ADMIN ROUTES ENDS

//Team Leader ROUTES STARTS
Route::group(['middleware'=>['IsAdmin']],function()
{
    //Vehicle Routes
    Route::get('vehicle/add',[VehicleController::class,'add']);
    Route::post('vehicle/save',[VehicleController::class,'save']);
    Route::get('vehicle/list',[VehicleController::class,'view']);
    Route::POST('importVehicle',[VehicleController::class,'importVehicle']);
    Route::get('vehicle/view-in-details/{id}',[VehicleController::class,'viewInDetails']);
    Route::get('vehicle/edit/{id}',[VehicleController::class,'edit']);
    Route::post('vehicle/update/{id}',[VehicleController::class,'update']);
    Route::get('vehicle/delete/{id}',[VehicleController::class,'destroy']);
    Route::get('vehicle/delete_all',[VehicleController::class,'destroyall']);
    Route::get('duplicate-data/delete',[VehicleController::class,'deleteDuplicateData']);

    //Agent ROUTES 
    Route::get('agent/add',[AgentController::class,'add']);
    Route::post('agent/save',[AgentController::class,'save']);
    Route::get('agent/edit/{id}',[AgentController::class,'edit']);
    Route::post('agent/update/{id}',[AgentController::class,'update']);
    
    //File Record Routes
    Route::get('file-record/view',[FileRecordController::class,'view']);
    Route::get('file-record/download/{id}',[FileRecordController::class,'downloadData']);
    Route::get('file-record/delete/{id}',[FileRecordController::class,'delete']);

    //File Shared Routes
    Route::Post('fileShared',[SharedFileRecordController::class,'create']);
    Route::get('file/shared',[SharedFileRecordController::class,'from']);
    Route::get('file/received',[SharedFileRecordController::class,'to']);
    Route::get('file/shared/delete/{id}',[SharedFileRecordController::class,'fromDelete']);
    Route::get('file/received/delete/{id}',[SharedFileRecordController::class,'toDelete']);

    //Letter Routes
    Route::get('letter/add',[LetterController::class,'index']);
    Route::post('letterSave',[LetterController::class,'save']);
    Route::get('letter/view',[LetterController::class,'view']);
    Route::get('letter/preview/{id}',[LetterController::class,'preview']);
    Route::get('letter/edit/{id}',[LetterController::class,'edit']);
    Route::post('letterUpdate/{id}',[LetterController::class,'update']);
    Route::get('letter/delete/{id}',[LetterController::class,'delete']);
    
    //Request Letter Routes
    Route::get('request-letter/list',[LetterController::class,'list']);
    Route::get('request-letter/approve/{id}',[LetterController::class,'approve']);
    Route::get('request-letter/reject/{id}',[LetterController::class,'reject']);
    Route::get('request-letter/delete/{id}',[LetterController::class,'requestDelete']);

});
//Team Leader ROUTES ENDS


//AdminAndTeamLeaderAccessible ROUTES STARTS
Route::group(['middleware'=>['SuperAdminAndAdminAccessible']],function()
{
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('search-history',[SearchHistoryController::class,'view']);
    Route::get('search-history/download',[SearchHistoryController::class,'export']);
    
    Route::get('agent/list',[AgentController::class,'view']);
    Route::get('search-agent',[AgentController::class,'searchAgent']);
    Route::get('agent/delete/{id}',[AgentController::class,'destroy']);
    Route::get('agent/logout/{id}',[AgentController::class,'logout']);

    //Auth
    Route::get('logout',[LoginController::class,'logout']);
    Route::get('my-profile',[LoginController::class,'myProfile']);
    Route::post('profileUpdate',[LoginController::class,'profileUpdate']);
    Route::get('change-password',[LoginController::class,'changePassword']);
    Route::Post('changePassword',[LoginController::class,'updatePassword']);
});
//AdminAndTeamLeaderAccessible ROUTES ENDS


//Start - if super admin amd admin login
Route::group(['middleware'=>['IsNotLogin']],function()
{
    Route::get('/',[LoginController::class,'login']);
});
//Start - if super admin amd admin login

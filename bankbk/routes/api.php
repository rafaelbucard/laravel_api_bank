<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\ProfitabilityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifiedController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\WithdrawController;
use Symfony\Component\HttpKernel\Exception\PreconditionFailedHttpException;

Route::get('/ping', function(){
    return ['pong' =>true];
});

Route::get('/401', [AuthController::class, 'unauthorized'])->name('login');

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function(){
    Route::post('/auth/validate',[AuthController::class,'validateToken']);
    Route::post('/auth/logout',[AuthController::class,'logout']);
    //Usuários
    Route::get('/user',[UserController::class,'getAll']);
    Route::get('/user/{id}',[UserController::class,'show']);
    Route::put('/userup/{id}',[UserController::class,'update']);
    Route::delete('/userdel/{id}',[UserController::class,'delete']);
    //

    //
    Route::get('/deposit/{id}',[DepositController::class,'depositUser']);
    Route::get('/deposit/{id}/specific/{id_deposit}',[DepositController::class,'getId']);
    Route::post('/deposit/{id}',[DepositController::class,'insert']);
    Route::delete('/depositdel/{id}',[DepositController::class,'delete']);
    //

    //
    Route::get('/balance/{id}',[BalanceController::class,'balanceUser']);
    Route::get('/balance/{id}/specific/{id_balance}',[BalanceController::class,'getId']);
    Route::post('/balance/{id}',[BalanceController::class,'insert']);
    Route::delete('/balancedel/{id}',[BalanceController::class,'delete']);
    Route::get('/balancesums/{id}',[BalanceController::class,'sumsId']);
    //

    //
    Route::get('/profitability/{id}',[ProfitabilityController::class,'profitabilityDeposit']);
    Route::get('/profitability/{id}/specific/{id_profitabilify}',[ProfitabilityController::class,'getId']);
    Route::post('/profitability/{id}',[ProfitabilityController::class,'insert']);
    Route::delete('/profitabilitydel/{id}',[ProfitabilityController::class,'delete']);
    //

    //
    Route::get('/wallet/{id}',[WalletController::class,'walletUser']);
    Route::get('/wallet/{id}/specific/{id_wallet}',[WalletController::class,'getId']);
    Route::post('/wallet/{id}',[WalletController::class,'insert']);
    Route::delete('/walletdel/{id}',[WalletController::class,'delete']);
    //

    //
    Route::get('/verified/{id}',[VerifiedController::class,'verifiedUser']);
    Route::get('/verified/{id}/specific/{id_verified}',[VerifiedController::class,'getId']);
    Route::post('/verified/{id}',[VerifiedController::class,'insert']);
    Route::delete('/verifieddel/{id}',[VerifiedController::class,'delete']);
    //

    //
    Route::get('/withdraw/{id}',[WithdrawController::class,'withdrawVerified']);
    Route::get('/withdraw/{id}/specific/{id_withdraw}',[WithdrawController::class,'getId']);
    Route::post('/withdraw/{id}',[WithdrawController::class,'insert']);
    Route::delete('/withdrawdel/{id}',[WithdrawController::class,'delete']);
    //
});


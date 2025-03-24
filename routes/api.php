<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CustomerController;
use Illuminate\Support\Facades\Auth;

// Contoh endpoint login untuk mendapatkan token (Anda bisa mengembangkan sesuai kebutuhan)
Route::post('/login', function (Request $request) {
    if (Auth::attempt($request->only('email', 'password'))) {
        $user = Auth::user();
        $token = $user->createToken('MyApp')->plainTextToken;
        return response()->json(['token' => $token], 200);
    }
    return response()->json(['error' => 'Unauthorised'], 401);
});

// Endpoint CRUD untuk Customer, dilindungi oleh middleware Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('customers', CustomerController::class);
});

?>
<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
        DB::beginTransaction();
        try{
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users|email',
                'password' => 'required|confirmed',
            ]);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            DB::commit();
            $user = User::where('email', $request->email)->first();
            return ResponseFormatter::success($user, 'Success', 200);
        }catch(Exception $error){
            DB::rollBack();
            return ResponseFormatter::error(null, $error->getMessage(), 500);
        }
    }
}

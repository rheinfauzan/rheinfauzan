<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControllerLogin extends Controller
{
    public function login()
    {
        return view('login.login');
    }  
      
    public function register()
    {
        return view('login.register');
    }

    public function store(Request $request)
    {
           $nama = $request->input('name'); 
           $email = $request->input('email');
           $password = $request->input('password');



           try {
                $user = User::create([
                    'name'  => $nama,
                    'email' => $email,
                    'password' => Hash::make($password),
                ]);
           } catch (\Exception $th) {
                Log::error("$th->getMessage()");
           }

           if($user) {
                return response()->json([
                    'success' => true,
                    'message' => 'Register Berhasil!',
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Register Gagal!'
                ], 400);
            };

    }


    public function check_login(Request $request)
    {
        $email      = $request->input('email');
        $password   = $request->input('password');

        if(Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Gagal!'
            ], 401);
        }

    }

}
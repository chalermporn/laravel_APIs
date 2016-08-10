<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use App\Http\Requests;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

use App\User;

class UserController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password); //enkripsi password
        if (User::create($data)) {
            return response()->json(['status'=> 'true', 'message' => 'register berhasil'], 200);
        }
        return response()->json(['status'=> 'false', 'message' => 'register gagal'], 500); 
    }

    public function login(LoginRequest $request)
    {
        //mengambil data request
        $credentials = $request->only('email', 'password');

        try {
            // cek apakah email dan password sudah benar
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['status' => 'false', 'message' => 'email atau password salah'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['status' => 'false' ,' message' => 'tidak bisa generate token'], 500);
        }

        // generate token bila tidak ada yang salah.
        return response()->json(['status'=> 'true', 'message' => 'login berhasil', 'token' => $token], 200);
    }
}

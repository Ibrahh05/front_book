<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

        
public function login(Request $request)
{
    $response = \Illuminate\Support\Facades\Http::post('http://127.0.0.1:8000/api/login', [
        'email' => $request->email,
        'password' => $request->password,
    ]);

    if ($response->successful()) {
        $data = $response->json();

        session(['jwt_token' => $data['access_token']]); 
        
        $userResponse = \Illuminate\Support\Facades\Http::withToken($data['access_token'])
            ->post('http://127.0.0.1:8000/api/me');

        if ($userResponse->successful()) {
            $userData = $userResponse->json();
            session(['user_name' => $userData['name']]);
        }

        return redirect('/'); 
    }

    return back()->withErrors(['email' => 'Credenciales incorrectas.']);
}

    public function logout()
    {
        session()->forget('jwt_token');
        return redirect()->route('login');
    }
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/register', $request->all());

        if ($response->successful()) {
            return redirect()->route('login')->with('success', 'Usuario creado, ya puedes entrar');
        }

        return back()->withErrors(['error' => 'No se pudo crear el usuario']);
    }
}
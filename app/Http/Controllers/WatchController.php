<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WatchController extends Controller
{
    private $apiUrl = 'http://127.0.0.1:8000/api/watches';

    public function index(Request $request)
    {
        if (!session()->has('jwt_token')) return redirect()->route('login');

        $response = Http::withToken(session('jwt_token'))->get($this->apiUrl);

        if ($response->successful()) {
            $json = $response->json();
            $watches = isset($json['data']) ? $json['data'] : $json;
            
            if ($request->has('model') && $request->model) {
                $watches = array_filter($watches, function($w) use ($request) {
                    return stripos($w['model'], $request->model) !== false;
                });
            }

            return view('watches.index', [
                'watches' => $watches,
                'user_name' => session('user_name', 'Usuario')
            ]);
        }
        
        return redirect()->route('login');
    }

    public function create()
    {
        if (!session()->has('jwt_token')) return redirect()->route('login');
        return view('watches.create', ['user_name' => session('user_name')]);
    }

    public function store(Request $request)
    {
        $response = Http::withToken(session('jwt_token'))->post($this->apiUrl, $request->all());

        if ($response->successful()) {
            return redirect()->route('watches.index')->with('success', 'Reloj creado correctamente.');
        }

        // Muestra el error REAL que manda el Servicio (ej: "El reloj ya existe")
        $errorMsg = $response->json()['error'] ?? 'Error desconocido al crear.';
        return back()->withInput()->withErrors(['error' => $errorMsg]);
    }

    public function edit($id)
    {
        if (!session()->has('jwt_token')) return redirect()->route('login');

        $response = Http::withToken(session('jwt_token'))->get("{$this->apiUrl}/{$id}");

        if ($response->successful()) {
            $json = $response->json();
            $watch = isset($json['data']) ? $json['data'] : $json;
            return view('watches.edit', ['watch' => $watch, 'user_name' => session('user_name')]);
        }

        return redirect()->route('watches.index')->withErrors(['error' => 'No se pudo cargar el reloj.']);
    }

    public function update(Request $request, $id)
    {
        $response = Http::withToken(session('jwt_token'))->put("{$this->apiUrl}/{$id}", $request->all());

        if ($response->successful()) {
            return redirect()->route('watches.index')->with('success', 'Actualizado.');
        }
        
        $errorMsg = $response->json()['error'] ?? 'Error al actualizar.';
        return back()->withInput()->withErrors(['error' => $errorMsg]);
    }

    public function destroy($id)
    {
        $response = Http::withToken(session('jwt_token'))->delete("{$this->apiUrl}/{$id}");

        if ($response->successful()) {
            return redirect()->route('watches.index')->with('success', 'Eliminado.');
        }
        
        $errorMsg = $response->json()['error'] ?? 'Error al eliminar.';
        return back()->withErrors(['error' => $errorMsg]);
    }
}
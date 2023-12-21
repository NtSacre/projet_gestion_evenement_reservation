<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Client.RegisterForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $userClient = new Client();
        $ClientValided = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],


            'email' => ['required', 'email'],
            'telephone' => ['required', 'string', 'max:12'],

            'password' => ['required'],
        ]);
        $ClientValided['password'] = Hash::make($request->password);






        if (Client::create($ClientValided)) {
            return redirect()->route('home.index');
        };
    }




    public function connexion(Request $request)
    {

        $userClient = Auth::guard('client')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        if ($userClient) {
            $id= Auth::guard('client')->user()->id;
            return redirect()->route('reservation.create', compact('id'));
        }
    }
    public function logout(Request $request)
    {
      
        Auth::guard('client')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('Client.Connexion');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AssociationControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Association.liste');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Association.RegisterForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $userAssoc = new Association();
        $AssocValided = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'slogan' => ['required', 'string'],
            'email' => ['required', 'email'],
            'date_de_creation' => ['required', 'string'],
            'logo' => ['required', 'image'],
            'password' => ['required'],
        ]);
        $AssocValided['password'] = Hash::make($request->password);
        $logo = $request->file('logo');



        if ($logo !== null && !$logo->getError()) {
            $AssocValided['logo'] = $logo->store('image', 'public');
        }

        if(Association::create($AssocValided)){
            return redirect()->route('assoc.edit');
        }

       
    }
    public function connexion(Request $request)
    {
      
        $userAssoc = Auth::guard('association')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        if ($userAssoc) {
           
           
            return redirect()->route('evenement.index');
        }
    }
    public function logout(Request $request)
    {
      
        Auth::guard('association')->logout();

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
        return view('Association.Connexion');
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

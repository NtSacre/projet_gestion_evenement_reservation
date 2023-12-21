<?php

namespace App\Http\Controllers;

use PHPUnit\Event\Event;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $Evens= Evenement::where('status',0)->get();
       return view('AllUsers.home', compact('Evens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // if(auth()->guard('client')->check()){
        //     $EvenReserver= Reservation::where('user_id', Auth::guard('client')->user()->id)->pluck('evenement_id')->toArray();
        // }
        $EvenReserver= auth()->guard('client')->check() ? Reservation::where('client_id', Auth::guard('client')->user()->id)->pluck('evenement_id')->toArray() : [];
       
        $Even= Evenement::where('id', $id)->first();
        return view('AllUsers.show', compact('Even', 'EvenReserver'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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

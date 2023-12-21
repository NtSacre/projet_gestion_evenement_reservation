<?php

namespace App\Http\Controllers;
use App\Models\Evenement;
use App\Models\Association;
use App\Models\Client;
use App\Models\Reservation;
use App\Notifications\DefavorableMail;
use App\Notifications\FavorableMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
      
        $Even= Evenement::findOrFail($id);
       return view('Reservation.Connexion', compact('Even'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $reservationValided=$request->validate([
           
'evenement_id' => ['required', 'integer'],
'nombre_de_place'=>['required', 'integer'],


        ]);
        
        $reservationValided['client_id'] = Auth::guard('client')->user()->id;
        $reservationValided['reference'] =Str::random(8);
        $reservationValided['is_accepted'] = false;
        $id=$reservationValided['evenement_id'];
        if(Reservation::create($reservationValided)){
            $userEmail= Client::where('id',Auth::guard('client')->user()->id)->first();
        
            $userEmail->notify(new FavorableMail());
return redirect()->route('home.show', compact('id'))->with('success', 'Votre reservation a été pris en compte');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function updateReservation( string $id)
    {
        $reservation= Reservation::findOrFail($id);
        $reservation->is_accepted=true;
        if($reservation->update()){
            $userEmail= Client::where('id',Auth::guard('client')->user()->id)->first();
            
            $userEmail->notify(new DefavorableMail());
            return back()->with('success','cette reservation à bien été décliné, un mail a été envoyé à l\'utilisateur');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

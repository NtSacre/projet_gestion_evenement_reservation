<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Association;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userAssoc= Association::where('id',Auth::guard('association')->user()->id)->first();
        $Evens= Evenement::where('association_id', Auth::guard('association')->user()->id)->get();
        return view('Evenement.liste', compact('Evens', 'userAssoc'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userAssoc= Association::where('id',Auth::guard('association')->user()->id)->first();
        return view('Evenement.AjouterFormEven', compact('userAssoc'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
   
       $EvenValider=$request->validate(([
        'libelle' => ['required', 'string'],
        
        'description' => ['required', 'string'],
        'image' => ['required', 'image'],
        'date_limite_inscrption' => ['required', 'string'],
        'date_evenement' => ['required', 'string'],
        'status' => ['required'],
       ]));
       $Even= new Evenement();
       $image= $request->file('image');
       if($image !== null && !$image->getError()){
        $EvenValider['image']= $image->store('imageEven', 'public');
       }
     
       $EvenValider['association_id']=Auth::guard('association')->user()->id;
      
       if($Even->insert($EvenValider)){
        return redirect()->route('evenement.index')->with('success', 'L\'evenement a été enregistré');
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $userAssoc= Association::where('id',Auth::guard('association')->user()->id)->first();
        $Even= Evenement::findOrFail($id);
        return view('Evenement.ModifierFormEven', compact('Even', 'userAssoc'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
        $EvenValider=$request->validate(([
            'libelle' => ['required', 'string'],
            
            'description' => ['required', 'string'],
            'image' => ['required', 'image'],
            'date_limite_inscrption' => ['required', 'string'],
            'date_evenement' => ['required', 'string'],
            'status' => ['required', 'string'],
           ]));
           $image = $request->file('image');

           $Even = Evenement::findOrFail($id);
   
           if ($image !== null && !$image->getError()) {
               if ($Even->image) {
                   Storage::disk('public')->delete($Even->image);
               }
               $EvenValider['image'] = $image->store('imageEven', 'public');
           }
         
   
   
   
           if ($Even->update($EvenValider)) {
               return redirect()->route('evenement.index')->with('success', 'L\'evenement a été modifié');
           }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Evenement::destroy($id)){
            return redirect()->route('evenement.index')->with('success', 'L\'evenement a été supprimé');
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function nombreReservation(string $id)
    {
       $Evens = Reservation::where('evenement_id', $id)->get();
     
       $userAssoc= Association::where('id',Auth::guard('association')->user()->id)->first();
       return view('Evenement.listeReservation',compact('Evens','userAssoc'));
    }
}

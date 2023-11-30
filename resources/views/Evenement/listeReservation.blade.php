@extends('Evenement.slidebar')



@section('content')

<div class="container">
@if(session('success'))
<div class="alert alert-success mt-5">
  {{session('success')}}
</div>

@endif


<div class="d-flex justify-content-between align-items-center">

  <a href="{{route('evenement.index')}}" class="btn btn-primary">Retour à la page précedente</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Evenement</th>
      <th scope="col">Client</th>
      <th scope="col">Nombre de place</th>
      <th scope="col">Reference</th>
      
     
      <th scope="col">Action</th>







    </tr>
  </thead>
  <tbody class="table-group-divider">
    @forelse($Evens as $Even)
 
    <tr>
      <th scope="row"></th>
      <td>{{$Even->evenement->libelle}}</td>
      <td>{{$Even->client->Nom}}</td>
      <td>{{$Even->nombre_de_place}}</td>
      <td>{{$Even->reference}}</td>
      




     


     


      <td class="d-flex gap-2 w-100 justify-content-end">
      @if($Even->is_accepted==0)
    
        <form action="{{route('evenement.updateReservation', $Even->id)}}" method="POST">
          @csrf

          <button type="submit" class="btn btn-danger">Décliner</button>
        </form>
@else
<p style="font-size: 15px; font-weight: bold; font-style:italic; color: red">déjà décliné</p>
@endif
      </td>




    </tr>
    @empty
    Aucune reservation pour l'instant 
    @endforelse

  </tbody>
</table>
</div>
@endsection
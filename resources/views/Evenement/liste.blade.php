@extends('Evenement.slidebar')



@section('content')

<div class="container">
@if(session('success'))
<div class="alert alert-success mt-5">
  {{session('success')}}
</div>

@endif


<div class="d-flex justify-content-between align-items-center">

  <a href="{{route('evenement.create')}}" class="btn btn-primary">Ajouter un evenement</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Libellé</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Date de limite d'inscription</th>
      <th scope="col">Status</th>
      <th scope="col">Date d'evenement</th>
      <th scope="col">Action</th>







    </tr>
  </thead>
  <tbody class="table-group-divider">
    @forelse($Evens as $Even)
  
    <tr>
      <th scope="row"></th>
      <td>{{$Even->libelle}}</td>
      <td>{{Str::limit($Even->description, 50,'...')}}</td>
      <td><img src="/storage/{{$Even->image}}" style="width: 100px;"></td>
      <td>{{$Even->date_limite_inscrption}}</td>
      <td>{{$Even->status==0 ? 'non cloturé' : 'cloturé'}} </td>



      <td>{{$Even->date_evenement}}</td>


      <td class="d-flex gap-2 w-100 justify-content-end">
        <a href="{{route('evenement.edit', $Even->id)}}" class="btn btn-primary">Modifier</a>
        <form action="{{route('evenement.destroy', $Even->id)}}" method="POST">
          @csrf

          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
        <a href="{{route('evenement.nombreReservation', $Even->id)}}" class="btn btn-primary">Nombre de reservation</a>
      </td>




    </tr>
    @empty
    Aucun evenement enregistrer
    @endforelse

  </tbody>
</table>
</div>
@endsection
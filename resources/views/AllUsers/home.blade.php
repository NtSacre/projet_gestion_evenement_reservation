@extends('AllUsers.nav')
@section('style')
<style>
  .banner {
    background-image: url('https://thumbs.dreamstime.com/z/joyeux-no%C3%ABl-typographique-sur-le-fond-blanc-avec-les-bo%C3%AEte-cadeau-et-la-d%C3%A9coration-rouge-133514446.jpg');
    background-size: cover;
    background-repeat: no-repeat;

    height: 355px;

  }
</style>
@section('content')
{{-- <h1 style="text-align: center" class="mt-5">
  Listes des Articles 
</h1> --}}

<div class="banner">

  <div class="row">
    <div class="col-sm-5">
      <div class="container ">
        <h1><b style="font-size: 50px;width:150px ;color:#383E42;">DEPECHEZ-VOUS!</b></h1>
        <p><b style="font-size: 45px;width:150px; color:#383E42">Participer à nos évènements</b></p>
        <button class="btn btn-danger">Contactez-nous!</button>
      </div>
    </div>

  </div>

</div>

<div class="container">
  <h1 style="text-align: center; font-weight:bold" class="mt-5"><span style="color: red; font-size: 18px">|EVENEMENT</span><br>
    Nous vous Presentons Les Meilleurs Evenements De L' Année
  </h1>

  <div class="row mt-5">
    @forelse($Evens as $Even)
    <div class="col-md-4">
      <div class="card mb-3 " style="width: 350px;">
        <h3 class="card-header ">{{$Even->libelle}}</h3>
        <div class="card-body" max-with="200px">
          <img src="/storage/{{$Even->image}}" alt="" srcset="" style="width: 350px; height:150px;">
        </div>



        <div class="card-body ">
          <p><b>Description: </b><br>{{Str::limit($Even->description, 150,'...')}}</p>
          <p><b>Date limite d'inscription:</b> <span style="color: red;">{{$Even->date_limite_inscrption}}</span></p>
          <p><b>Date de l'evenement:</b> <span style="color:#0D6EFD">{{$Even->date_evenement}}</span></p>


        </div>
        <div class="card-footer text-muted">
          <a href="{{route('home.show', $Even->id)}}" class="btn btn-primary">Detail</a>
        </div>
      </div>

    </div>

    @empty
    Aucun Evenement pour l'instant
    @endforelse
  </div>
</div>
@endsection
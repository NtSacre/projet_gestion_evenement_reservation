@extends('AllUsers.nav')
@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success mt-5">
        {{session('success')}}
    </div>

    @endif

    <div class="card mb-8" width="1000px">
        <h1 class="card-header">{{$Even->libelle}}</h1>
        <div class="card-body" style="max-width: 70%;">
            <img src="/storage/{{$Even->image}}" alt="" srcset="" width="100%">
        </div>

        <div class="card-body">
            <p><b>Description:</b> </p>
            <p class="card-text">{{$Even->description}}</p>
        </div>

        <div class="card-body">
            <p><b>Date limite d'inscription:</b> <span style="color: red;">{{$Even->date_limite_inscrption}}</span></p>
            <p><b>Date de l'evenement:</b> <span style="color:#0D6EFD">{{$Even->date_evenement}}</span></p>
        </div>

        <div class="card-footer text-muted">
           
            @if(in_array($Even->id, $EvenReserver))
            <p style="color: red; font-weight: bold; font-style: italic">Vous avez déjà une réservation pour cette évènement</p>
            @else

            <a href="{{route('reservation.create', $Even->id)}}" class="btn btn-warning">Reserver ma place</a>
            @endif
        </div>
    </div>

</div>
@endsection
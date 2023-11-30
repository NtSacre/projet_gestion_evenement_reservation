@extends('AllUsers.nav')

@section('content')
<div class="container">
<form class="form-horizontal" method="post" action="{{route('reservation.store')}}">
    @csrf
    <fieldset>
        <legend>Nombre de place </legend>
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Nombre de place</label>
            <div class="col-lg-10">
                <input type="number" class="form-control"  name="nombre_de_place">
               
                <input type="hidden" class="form-control"  name="evenement_id" value="{{$Even->id}}">

            </div>
            
        </div>
        

        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </fieldset>
</form>
</div>
@endsection
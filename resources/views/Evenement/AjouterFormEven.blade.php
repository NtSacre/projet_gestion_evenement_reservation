@extends('Evenement.slidebar')

@section('content')
<div class="container">
<div>
        <a href="{{route('evenement.index')}}" > <--Retour vers la page précedente</a>
    </div>
<form class="form-horizontal" method="post" action="{{route('evenement.store')}}" enctype="multipart/form-data">
    @csrf
    <fieldset>
        <legend>Ajouter un evenement</legend>
        <div class="form-group">
            <label class="col-lg-2 control-label">Libellé</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="libelle">
            </div>
            @error('libelle')
            {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Description</label>
            <div class="col-lg-10">
                <textarea class="form-control" name="description"></textarea>
            </div>
            @error('description')
            {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Image</label>
            <div class="col-lg-10">
                <input class="form-control" name="image" type="file">
            </div>
            @error('image')
            {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Date limite d'inscription</label>
            <div class="col-lg-10">
                <input class="form-control" name="date_limite_inscrption" type="date">
            </div>
            @error('date_limite_inscrption')
            {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">Date de l'evenement</label>
            <div class="col-lg-10">
                <input class="form-control" name="date_evenement" type="date">
            </div>
            @error('date_evenement')
            {{$message}}
            @enderror
        </div>

        <div class="form-group">
            <label class="col-lg-2   control-label" for="optionsRadios1"></label>
            <div class="col-lg-10">

                <input class=" mt-5 form-check-input" type="checkbox" name="status" id="optionsRadios1" value="1">
                <input class=" form-check-input" type="hidden" name="status" id="optionsRadios1" value="0">
                <label class=" control-label" for="optionsRadios1">Cloture</label>
                @error('status')
                {{$message}}
                @enderror
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
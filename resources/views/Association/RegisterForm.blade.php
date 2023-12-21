@extends('AllUsers.nav')

@section('content')
<div class="container">
<form class="form-horizontal" action="{{route('assoc.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset>
        <legend>S'inscrire en tant qu'Association</legend>
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Nom</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="nom">
            </div>
        </div>
        @error('nom')
        {{message}}
        @enderror
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">slogon</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="slogan">
            </div>

        </div>
        @error('slogan')
        {{message}}
        @enderror
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
                <input type="email" class="form-control" name="email">
            </div>
        </div>
        @error('email')
        {{message}}
        @enderror
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Date de création</label>
            <div class="col-lg-10">
                <input type="date" class="form-control" name="date_de_creation">
            </div>
        </div>
        @error('date_creation')
        {{message}}
        @enderror
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">logo</label>
            <div class="col-lg-10">
                <input type="file" class="form-control" name="logo">
            </div>
        </div>
        @error('logo')
        {{message}}
        @enderror
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Password</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" name="password">
            </div>
        </div>
        @error('password')
        {{message}}
        @enderror

        <div class="form-group ">
            <div class="col-lg-10 col-lg-offset-2">

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            
        </div>
        <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
        <a style="font-weight: bold; color:blue;" href="{{route('assoc.edit')}}">J'ai déjà un compte</a>
        </div>
        </div>
    </fieldset>
</form>
</div>
@endsection
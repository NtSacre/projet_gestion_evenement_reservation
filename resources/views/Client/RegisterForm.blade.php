@extends('AllUsers.nav')

@section('content')

<form class="form-horizontal" action="{{route('client.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset>
        <legend>S'inscrire</legend>
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Nom</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="nom">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Prenom</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="prenom">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
                <input type="email" class="form-control" name="email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">telephone</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" name="telephone">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Password</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" name="password">
            </div>
        </div>


        <div class="form-group ">
            <div class="col-lg-10 col-lg-offset-2">

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <a style="font-weight: bold; color:blue;" href="{{route('client.edit')}}">j'ai un compte</a>
        </div>
        </div>
    </fieldset>
</form>
@endsection
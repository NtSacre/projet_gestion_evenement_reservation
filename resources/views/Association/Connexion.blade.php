@extends('AllUsers.nav')

@section('content')
<div class="container">
<form class="form-horizontal" method="post" action="{{route('assoc.connexion')}}">
    @csrf
    <fieldset>
        <legend>Se connecter en tant qu'Association</legend>
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">

            </div>
        </div>




        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <a style="font-weight: bold; color:blue;" href="{{route('assoc.create')}}">Creer un compte</a>
        </div>
        </div>
    </fieldset>

</form>
</div>
@endsection
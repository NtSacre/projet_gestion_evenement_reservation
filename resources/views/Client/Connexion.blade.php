@extends('AllUsers.nav')

@section('content')

<form class="form-horizontal" method="post" action="{{route('client.connexion')}}">
    @csrf
    <fieldset>
        <legend>Se connecter</legend>
        <div class="form-group">
            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="inputEmail" placeholder="Email" name="email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
            <div class="col-lg-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">

            </div>
        </div>


        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <a style="font-weight: bold; color:blue;" href="{{route('client.create')}}">Creer un compte</a>
        </div>
        </div>
    </fieldset>
</form>
@endsection
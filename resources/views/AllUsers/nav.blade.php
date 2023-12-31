<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://bootswatch.com/3/sandstone/bootstrap.min.css">
    @yield('style')
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('home.index')}}">MERRY CHRISTMAS</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{route('client.edit')}}">Se connecter<span class="sr-only">(current)</span></a></li>
                    <li><a href="{{route('client.logout')}}">Deconnexion</a></li>
                  
                </ul>
                
              <ul class="nav navbar-nav " >
             <li> <a  href="{{route('evenement.index')}}">Ajouter un evenement</a></li>
              </ul>
                      
                    
                <form class="navbar-form navbar-right" role="search">
                 
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                
            </div>
        </div>
    </nav>
    
        @yield('content')
    
</body>

</html>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Rodri</a>
                  <div class="navbar-nav">
                  <a class="nav-item nav-link" href="{{url('/show')}}">Show</a>
                  <a class="nav-item nav-link" href="{{url('/')}}">Add</a>
                  </div>
            </nav>
        </header>
        <div class='conteiner'>
            <div class='row'>
                <div class='col-4'>

                </div>
                <div class="col-4">
                    @yield('container')
                </div>
                <div class="col-4">

                </div>
            </div>
        </div>

    </body>
</html>
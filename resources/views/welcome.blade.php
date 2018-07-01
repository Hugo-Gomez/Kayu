<!DOCTYPE html>
<html>
<head>
<title>Bienvenue sur Kayu</title>
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/fontawesome-all.css') }}" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<style>
    body {
        height: 100vh;
        width: 100%;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        align-content: space-around;
    }

    .row {
            margin-right: 0;
            margin-left: 0;
        }

    .buttons {
        display: flex;
        justify-content: space-between;
        width: 20vw;
    }

    .buttons .vege-btn {
        padding: 10px 20px;
    }

    body::after {
        content: '';
        background-image: url('images/vegetables-fresh.jpg');
        background-position: center center;
        opacity: 0.2;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        z-index: -1;
    }

    .welcome {
        text-align: center;
    }

    .presentation {
         display: flex;
         justify-content: center;
         margin-top: 10px;
    }
</style>
<body>
    <div class="welcome">
        <h1>KAYU</h1>
        <p>L'application attentive à votre consommation</p>
    </div>


      @if (Auth::guest())
        <div class="buttons">
          <a href="{{ route('login') }}"><button type="button" class="vege-btn btn btn-round btn-primary">Se connecter</button></a>
          <a href="{{ route('register') }}"><button type="button" class="vege-btn btn btn-round btn-success">S'inscrire</button></a>
        </div>
      @else
        <div class="buttons myaccount">
          <a href="{{ route('dashboard') }}"><button type="button" class="vege-btn btn btn-round btn-primary">Mon dashboard</button></a>
        </div>
      @endif

    </div>

    <div class="row presentation">
        <div class="card col-xs-10 col-sm-4">
            <div class="card-body">
              <h5 class="card-title">Qu'est-ce que Kayu ?</h5>
              <p class="card-text">Kayu est un projet mélangeant Objet Connectés, web et mobile.
                Il vous permet grâce à un boitier et une application mobile de scanner vos produits,
                et éviter de consommer des produits avec des ingrédients ou additifs que vous voulez éviter.
                Grâce à ce site, vous pouvez rentrer vos préférences et paramètres de consommation, qui seront pris en compte par l'appli relié à votre compte.
                Grâce au boitier, vous saurez par des LED si le produit est propre à votre consommation ou pas.</p>
            </div>
        </div>
    </div>
</body>
</html>

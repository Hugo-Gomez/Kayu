<!DOCTYPE html>
<html>
<head>
<title>Bienvenue sur Kayu</title>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/fontawesome-all.css') }}" />
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

    .buttons {
        display: flex;
        justify-content: space-between;
        width: 15vw;
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
</style>
<body>
    <div class="welcome">
        <h1>KAYU</h1>
        <p>L'application attentive à votre consommation</p>
    </div>
    
    <div class="buttons">
        <a href="{{ route('login') }}"><button type="button" class="vege-btn btn btn-round btn-primary">Log In</button></a>
        <a href="{{ route('register') }}"><button type="button" class="vege-btn btn btn-round btn-success">Register</button></a>
    </div>
</body>
</html>

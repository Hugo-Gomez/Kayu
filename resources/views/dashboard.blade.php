@extends('layouts.structure')

@section('content')
  <style>
    .dashboard-body {
      display: flex;
      flex-wrap: wrap;
    }
    .dashboard-content {
      display: flex;
      align-items: center;
      justify-content: space-around;
      flex: 1 0 32.7%;
      border: 2px solid #e6e9ed;
      border-radius: 10px;
      padding: 10px 20px;
      margin: 0 5px 10px 5px;
      height: 100%;
      width: 32.7%;
    }

    .thumbnail {
      margin-bottom: 0;
    }
  </style>

  <div class="page-title">
    <div class="title_left">
      <h1>Bonjour {{ $user->prenom }}</h1>
    </div>
  </div>

  @if ($i == 0)
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                  <h3>Votre dashboard</h3>
                </div>

                <div class="x_content">
                  <p>Vous avez actuellement scanné {{ $i }} produit :</p>
                  <p>Kayu est un projet mélangeant Objet Connectés, web et mobile.
                    Il vous permet grâce à un boitier et une application mobile de scanner vos produits,
                    et éviter de consommer des produits avec des ingrédients ou additifs que vous voulez éviter.
                    Grâce à ce site, vous pouvez rentrer vos préférences et paramètres de consommation, qui seront pris en compte par l'appli relié à votre compte.
                    Grâce au boitier, vous saurez par des LED si le produit est propre à votre consommation ou pas.</p>
                </div>

                <div class="x_content">

                </div>

            </div>
        </div>
    </div>

  @else
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                  <h3>Votre dashboard</h3>
                </div>

                <p>Vous avez actuellement scanné {{ $i }} produits :</p>
                <div class="x_content dashboard-body">
                  @while ($i > 0)
                    <div class="dashboard-content">
                      <img class="thumbnail img-product" src="{{ $inputs[$i]["image"]->image }}" alt="Aperçu du produit">
                      <ul style="list-style: none;">
                        <li style="font-weight:bold;">{{ $inputs[$i]["name"]->name }}</li>
                        @if ($inputs[$i]["status"]->status == "yes")
                      <li style="margin-left: 20px;">↳ <span style="color:#28a745;">• Propre à votre consommation lors du scan le {{ Carbon\Carbon::parse($inputs[$i]["created_at"]->created_at)->format('d/m/Y') }}</span></li>
                        @else
                          <li style="margin-left: 20px;">↳ <span style="color:#dc3545;">• Impropre à votre consommation lors du scan le {{ Carbon\Carbon::parse($inputs[$i]["created_at"]->created_at)->format('d/m/Y') }}</span></li>
                        @endif
                      </ul>
                      @php
                        $i--;
                      @endphp
                    </div>
                  @endwhile
                </div>

            </div>
        </div>
    </div>
  @endif
@endsection

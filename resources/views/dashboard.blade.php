@extends('layouts.structure')

@section('content')
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

                <div class="x_content">
                  <p>Vous avez actuellement scanné {{ $i }} produits :</p>
                  @while ($i > 0)
                    <ul>
                      <li>{{ $inputs[$i]["name"] }}</li>
                       <li>{{ $inputs[$i]["status"]->status }}</li>
                    </ul>
                    @php
                       $i--;
                    @endphp
                  @endwhile
                </div>

            </div>
        </div>
    </div>
  @endif
@endsection

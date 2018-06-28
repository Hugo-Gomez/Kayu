@extends('layouts.structure')

@section('content')
  <style>
    .vertical-separator {
      width: 2px;
      background-color: #e6e9ed;
      margin: 0 20px;
    }

    .bold {
      font-weight: bold;
    }
    .product-content {
      display: flex;
    }

    .product-thumbnail {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .product-infos {
      display: flex;
      justify-content: space-around;
      width: 100%;
    }
  </style>
    @if ($i > 0)
      <div class="page-title">
        <div class="title_left">
        <h1>Historique de vos {{ $i }} derniers produits scannés</h1>
        </div>
      </div>

      @while ($i != 0)
        <div class="row justify-content-center">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                      <h3>Produit {{ $i }} : {{ $inputs[$i]['name'] }}</h3>
                    </div>
                    <div class="x_content product-content">
                      <div class="product-thumbnail">
                        <img class="thumbnail" src="{{ $inputs[$i]['image'] }}" alt="Image du produit">
                        <p class="bold">Code barre</p>
                        <p>{{ $inputs[$i]['barcode'] }}</p>
                      </div>

                      <div class="vertical-separator"></div>

                      <div class="product-infos">
                        <div class="product-ingredients">
                            <p class="bold">Ingrédients</p>
                            <ul>
                              @if ($inputs[$i]['ingredients_tags'])
                                @foreach ($inputs[$i]['ingredients_tags'] as $ingredient)
                                  @php
                                    $ingredient = substr($ingredient, strpos($ingredient, ":") + 1);
                                    $ingredient = preg_replace('/-/', ' ', $ingredient);
                                    $ingredient = ucfirst( $ingredient );
                                  @endphp
                                  <li> {{ $ingredient }} </li>
                                @endforeach
                              @elseif ($inputs[$i]['ingredients_image'])
                                <img class="thumbnail" src="{{ $inputs[$i]['ingredients_image'] }}" alt="Images des ingrédients">
                              @else
                                <p>Aucun ingrédients n'a été spécifié pour ce produit</p>
                              @endif
                            </ul>
                        </div>

                        <div class="vertical-separator"></div>
                        
                        <div class="product-additives">
                            <p class="bold">Additifs</p>
                            @if ($inputs[$i]["additives_tags"])
                              @php
                                foreach ($inputs[$i]["additives_tags"] as $a) {
                                  echo '<ul>';
                                    $a = substr($a, strpos($a, ":") + 1);
                                    $a = preg_replace('/e/', 'E', $a, 1);
                                    if (DB::table('additives')->where('id', '=', $a)->get()->first())
                                    {
                                      $b = DB::table('additives')->where('id', '=', $a)->get()->first();
                                    } else {}
                                    if ($b->toxicity == "toxic" || $b->toxicity == "super-toxic") {
                                      echo '<li style="color: red;">' . $b->id . '</li>';
                                    }
                                    elseif ($b->toxicity == "no-abuse" || $b->toxicity == "doubt") {
                                      echo '<li style="color: orange;">' . $b->id . '</li>';
                                    }
                                    else {
                                      echo '<li style="color: green;">' . $b->id . '</li>';
                                    }
                                    echo '<li>' . $b->name . '</li>';
                                    echo '<li>' . $b->label . '</li>';
                                  echo '</ul>';
                                }
                              @endphp
                            @else
                              <p>Aucun additifs n'a été spécifié pour ce produit</p>
                            @endif
                        </div>

                        <div class="vertical-separator"></div>
                        
                        <div class="product-nutrients">
                            <p class="bold">Nutriments</p>
                            @if ( $inputs[$i]['nutrient_levels'] )
                              <ul>
                                <li>Niveau de sucre : {{ $inputs[$i]['nutrient_levels']["sugars"] }}</li>
                                <li>Niveau de matières grasses : {{ $inputs[$i]['nutrient_levels']["fat"] }}</li>
                                <li>Niveau de matières grasses saturées : {{ $inputs[$i]['nutrient_levels']["saturated-fat"] }}</li>
                                <li>Niveau de sels : {{ $inputs[$i]['nutrient_levels']["salt"] }}</li>
                              </ul>
                            @else
                            <p>Aucun nutriments n'a été spécifié pour ce produit</p>
                            @endif
                        </div>
                      </div>

                    </div>
                </div>
            </div>
        </div>
        @php
          $i--;
        @endphp
      @endwhile
    @else
      <div class="page-title">
        <div class="title_left">
          <h1>Vous n'avez pas encore scanné de produits</h1>
        </div>
      </div>
    @endif
@endsection

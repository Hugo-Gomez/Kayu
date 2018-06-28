@extends('layouts.structure')

@section('content')

    </p>
    <div class="page-title">
      <div class="title_left">
        <h1>L'historique de vos 10 derniers produits scannés</h1>
      </div>
    </div>

    @while ($i > 0)
      <div class="row justify-content-center">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                    <h3>Produit {{ $i }} : {{ $inputs[$i]['name'] }}</h3>
                  </div>
                  <div class="x_content">
                    <p><img src=" {{ $inputs[$i]['image'] }}" alt="Image du produit">
                    </p>
                    <p>
                      Code barre : {{ $inputs[$i]['barcode'] }}
                    </p>
                    <p>
                      Ingrédients :
                      <ul>
                        @foreach ($inputs[$i]['ingredients_tags'] as $ingredient)
                          @php
                            $ingredient = substr($ingredient, strpos($ingredient, ":") + 1);
                            $ingredient = preg_replace('/-/', ' ', $ingredient);
                            $ingredient = ucfirst( $ingredient );
                          @endphp
                          <li> {{ $ingredient }} </li>
                        @endforeach
                      </ul>
                    </p>
                    <p>
                      Additifs :
                      @php
                        foreach ($inputs[$i]["additives_tags"] as $a) {
                          echo '<ul>';
                            $a = substr($a, strpos($a, ":") + 1);
                            $a = preg_replace('/e/', 'E', $a, 1);
                            if (DB::table('additives')->where('id', '=', $a)->get()->first())
                            {
                              $b = DB::table('additives')->where('id', '=', $a)->get()->first();
                            }
                            echo '<li>' . $b->id . '</li>';
                            echo '<li>' . $b->name . '</li>';
                            echo '<li>' . $b->label . '</li>';
                          echo '</ul>';
                        }
                      @endphp
                    </p>
                    <p>
                      Nutriements :
                      @if ( $inputs[$i]['nutrient_levels']["sugars"] )
                        <ul>
                          <li>Sucre : {{ $inputs[$i]['nutrient_levels']["sugars"] }}</li>
                          <li>Matières grasses : {{ $inputs[$i]['nutrient_levels']["fat"] }}</li>
                          <li>Matières grasses saturées : {{ $inputs[$i]['nutrient_levels']["saturated-fat"] }}</li>
                          <li>Sels : {{ $inputs[$i]['nutrient_levels']["salt"] }}</li>
                        </ul>
                      @else
                        Désolé les informations de ce produit ne sont pas complètes
                      @endif

                  </div>
              </div>
          </div>
      </div>
      @php
         $i--;
      @endphp
    @endwhile
@endsection

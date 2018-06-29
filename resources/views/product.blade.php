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

    .myhr {
      margin-top: 10px;
      margin-bottom: 10px;
      border: 0;
      border-top: 2px solid #e6e9ed;
      width: 100%;
    }
  </style>
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                  <h3><i class="fas fa-utensils"></i> Produit : {{ $inputs['name'] }}</h3>
                </div>
                <div class="x_content product-content">
                  <div class="product-thumbnail">
                    <img class="thumbnail" src="{{ $inputs['image'] }}" alt="Image du produit">
                    <p class="bold">Code barre</p>
                    <p>{{ $inputs['barcode'] }}</p>
                  </div>

                  <div class="vertical-separator"></div>

                  <div class="product-infos">
                    <div class="product-ingredients">
                        <p class="bold">Ingrédients</p>
                        <ul>
                          @if ($inputs['ingredients_tags'])
                            @foreach ($inputs['ingredients_tags'] as $ingredient)
                              @php
                                $ingredient = substr($ingredient, strpos($ingredient, ":") + 1);
                                $ingredient = preg_replace('/-/', ' ', $ingredient);
                                $ingredient = ucfirst( $ingredient );
                              @endphp
                              <li> {{ $ingredient }} </li>
                            @endforeach
                          @elseif ($inputs['ingredients_image'])
                            <img class="thumbnail" src="{{ $inputs['ingredients_image'] }}" alt="Images des ingrédients">
                          @else
                            <p>Aucun ingrédients n'a été spécifié pour ce produit</p>
                          @endif
                        </ul>
                    </div>

                    <div class="vertical-separator"></div>

                    <div class="product-additives">
                        <p class="bold">Additifs</p>
                        @if ($inputs["additives_tags"])
                          @php
                            foreach ($inputs["additives_tags"] as $a) {
                              echo '<ul>';
                                $a = substr($a, strpos($a, ":") + 1);
                                $a = preg_replace('/e/', 'E', $a, 1);
                                if (DB::table('additives')->where('id', '=', $a)->get()->first())
                                {
                                  $b = DB::table('additives')->where('id', '=', $a)->get()->first();
                                  
                                  if ($b->toxicity == "toxic" || $b->toxicity == "super-toxic") {
                                    echo '<li style="color: red;">' . $b->id . '</li>';
                                  }
                                  elseif ($b->toxicity == "no-abuse" || $b->toxicity == "doubt") {
                                    echo '<li style="color: orange;">' . $b->id . '</li>';
                                  }
                                  else {
                                    echo '<li style="color: green;">' . $b->id . '</li>';
                                  }
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



                  </div>
                </div>

                <div class="x_content product-content"><hr class="myhr"></div>
                <div class="x_content product-content">

                  <div class="product-nutrients">
                      <p class="bold">Nutriments</p>
                      @if ( $inputs['nutrient_levels'] )
                        <ul>
                          <li>Niveau de sucre<ul><li style="color:{{ $inputs["sugar"]["color"] }};">{{ $inputs["sugar"]["text"] }}</li></ul></li>
                          <li>Niveau de matières grasses<ul><li style="color:{{ $inputs["fat"]["color"] }};">{{ $inputs["fat"]["text"] }}</li></ul></li>
                          <li>Niveau de matières grasses saturées<ul><li style="color:{{ $inputs["saturedFat"]["color"] }};">{{ $inputs["saturedFat"]["text"] }}</li></ul></li>
                          <li>Niveau de sels<ul><li style="color:{{ $inputs["salt"]["color"] }};">{{ $inputs["salt"]["text"] }}</li></ul></li>
                        </ul>
                      @else
                      <p>Aucun nutriments n'a été spécifié pour ce produit</p>
                      @endif
                  </div>

                  <div class="vertical-separator"></div>

                  <div class="product-nutrients">
                      <p class="bold">Calories</p>
                      <ul>

                          @if ( $inputs['energy_value'] )
                            <li>{{ $inputs["energy_value"] }} {{ $inputs["energy_unit"] }}</li>
                            @if ($user->caloriesMax != 0 || $user->caloriesMax != null)
                              <li style="color:{{ $inputs["energy_value_color"] }};">{{ $inputs["energy_value_text"] }}</li>
                            @endif
                          @else
                            <li>Aucune information n'a été trouvée</li>
                          @endif
                        </li>
                      </ul>

                      <p class="bold">Huile de palme</p>
                      <ul>
                          @if ($user->palmOil == 0)
                            @if ( $inputs['PalmOil'] != null && $user->palmOil == 1)
                              <li>Présence</li>
                              <li style="color:red">Cela ne correspond pas à vos préférences</li>
                            @elseif ($inputs['MaybePalmOil'] != null)
                              <li>Potentielle présence</li>
                              <li style="color:red">Cela ne correspond pas vraiment à vos préférences</li>
                            @else
                              <li>Absence</li>
                            @endif
                          @else
                            @if ( $inputs['PalmOil'] != null && $user->palmOil == 1)
                              <li>Présence</li>
                            @elseif ($inputs['MaybePalmOil'] != null)
                              <li>Potentielle présence</li>
                            @else
                              <li>Absence</li>
                            @endif
                          @endif
                      </ul>
                  </div>

              </div>
            </div>
        </div>
    </div>
@endsection

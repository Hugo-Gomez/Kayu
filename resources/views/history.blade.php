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
      <div class="page-title col-md-6 col-sm-12 col-xs-12">
        <h1>Historique de vos {{ $i }} derniers produits scannés</h1>
      </div>
      <div class="row justify-content-center">
      @while ($i != 0)
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_content product-content">
                      <div class="product-thumbnail">
                        <img class="thumbnail" src="{{ $inputs[$i]['image']->image }}" alt="Image du produit">
                      </div>
                      <div class="vertical-separator"></div>
                      <div>
                        <h3><a href="{{ url('history/'.$i) }}">Produit {{ $i }} : {{ $inputs[$i]['name']->name }}</a></h3>
                        <p><span class="bold">Code barre </span>: {{ $inputs[$i]['barcode']->barcode }}</p>
                        <p><span class="bold">Correspond à vos préférences </span>: {{ $inputs[$i]['status']->status }}</p>
                      </div>
                    </div>
                </div>
            </div>
        @php
          $i--;
        @endphp
      @endwhile
      </div>
    @else
      <div class="page-title">
        <div class="title_left">
          <h1>Vous n'avez pas encore scanné de produits</h1>
        </div>
      </div>
    @endif
@endsection

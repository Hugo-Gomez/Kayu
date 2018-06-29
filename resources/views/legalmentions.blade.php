@extends('layouts.structure')

@section('content')
  <div class="page-title">
    <div class="title_left">
      <h1>Mentions légales</h1>
    </div>
  </div>

  <div class="row justify-content-center">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
              <div class="x_title">
                <h3>Editeur</h3>
              </div>

              <div class="x_content">
                <p>
                  Le site Kayu est édité par <a href="http://www.lp-dw.com/">
                  4 développeurs de la LP DW de Cergy-Pontoise </a>.
                  <br>Avenue Marcel Paul, Z.A.C des Barbanniers, 92230 Gennevilliers<br>
                  e-mail : <a href="mailto:contact@kayu.fr">contact@kayu.fr</a>
                </p>
                <p>
                  Le site est hébergé sur <a href="https://www.fastcomet.com/" target="_blank">FastComet</a>.
                </p>
                <p>
                  L'accès ou l'utilisation du site ou de ses services valent acceptation sans réserve des
                  <a href="{{ url('cgu') }}">conditions d'utilisations</a>.
                </p>
              </div>
          </div>
          <div class="x_panel">
              <div class="x_title">
                <h3>Licence d'utilisation des données des produits alimentaires</h3>
              </div>

              <div class="x_content">
                <p>
                  Le site Kayu utilise la base de données Open Food Facts qui est disponible sous la licence
                  <a href="https://opendatacommons.org/licenses/odbl/1.0/">Open Database License</a>.<br>
                  Les contenus individuels de la base de données sont disponibles sous la licence
                  <a href="https://opendatacommons.org/licenses/dbcl/1.0/">Database Contents License</a>.<br>
                  Les photos de produits sont disponibles sous la licence
                  <a href="https://creativecommons.org/licenses/by-sa/3.0/deed.en">Creative Commons Attribution Partage à l'identique</a>.
                  Elles peuvent contenir des éléments graphiques soumis à droit d'auteur, copyright ou droit des marques,
                  qui peuvent dans certains cas être reproduits (droit de citation, droit à l'information ou "fair use").
                  </p>
                  <p>
                    Retrouvez
                    <a href="https://fr.openfoodfacts.org/conditions-d-utilisation">
                      toutes les conditions d'utilisation, de contribution et de réutilisation d'Open Food Facts
                    </a>.<br>
                  </p>
              </div>
          </div>
      </div>
  </div>
@endsection

@extends('layouts.structure')

@section('content')
  <div class="row justify-content-center">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
              <div class="x_title">
                <h3><i class="fa fa-sliders-h"></i> Mes préférences</h3>
              </div>

              <div class="x_content">
                {!! Form::open(array('url' => '/formpref', 'class' => 'form-horizontal form-label-left')) !!}

                    <div class="form-group">
                        {{ Form::label('palmOil', 'Huile de palme', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) }}
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          @if ($user->palmOil == 0)
                            <div class="radio">
                              <label>
                                {{ Form::radio('palmOil', '1', false, array('class' => 'flat')) }} Indifférent
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                {{ Form::radio('palmOil', '0', true, array('class' => 'flat')) }} Sans huile de palme
                              </label>
                            </div>
                          @else
                            <div class="radio">
                              <label>
                                {{ Form::radio('palmOil', '1', true, array('class' => 'flat')) }} Indifférent
                              </label>
                            </div>
                            <div class="radio ">
                              <label>
                                {{ Form::radio('palmOil', '0', false, array('class' => 'flat')) }} Sans huile de palme
                              </label>
                            </div>
                          @endif
                        </div>
                    </div>

                    <div class="form-group">
                      {{ Form::label('kcal', 'Le nombre de calories max (en kcal)', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) }}
                      <div class="col-md-5 col-sm-7 col-xs-12">
                        {{ Form::number('kcal', $user->caloriesMax, array('class' => 'form-control')) }}
                      </div>
                    </div>

                    <div class="form-group row">
                      {{ Form::label('salt', 'Présence de sel', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) }}
                      <div class="col-md-5 col-sm-7 col-xs-12">
                        {{ Form::select('salt', array('high' => 'Indifférent', 'medium' => 'Moyenne', 'low' => 'Faible'), $user->salt, array('class' => 'form-control')) }}
                      </div>
                    </div>

                    <div class="form-group row">
                      {{ Form::label('sugar', 'Présence de sucre', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) }}
                      <div class="col-md-5 col-sm-7 col-xs-12">
                        {{ Form::select('sugar', array('high' => 'Indifférent', 'medium' => 'Moyenne', 'low' => 'Faible'), $user->sugar, array('class' => 'form-control')) }}
                      </div>
                    </div>

                    <div class="form-group row">
                      {{ Form::label('fat', 'Présence de matières grasses', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) }}
                      <div class="col-md-5 col-sm-7 col-xs-12">
                        {{ Form::select('fat', array('high' => 'Indifférent', 'medium' => 'Moyenne', 'low' => 'Faible'), $user->fat, array('class' => 'form-control')) }}
                      </div>
                    </div>

                    <div class="form-group row">
                      {{ Form::label('saturedFat', 'Présence de matières grasses saturées', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) }}
                      <div class="col-md-5 col-sm-7 col-xs-12">
                        {{ Form::select('saturedFat', array('high' => 'Indifférent', 'medium' => 'Moyenne', 'low' => 'Faible'), $user->saturedFat, array('class' => 'form-control')) }}
                      </div>
                    </div>

                    <div class="form-group row">
                      {{ Form::label('additives', 'Rejet des additifs', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) }}
                      <div class="col-md-5 col-sm-7 col-xs-12">
                        {{ Form::select('additives', array('nothing' => 'Aucun', 'toxic' => 'Toxiques', 'dangerous' => 'Toxiques et douteux'), $user->additives, array('class' => 'form-control')) }}
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12"></div>
                    <div class="col-md-5 col-sm-7 col-xs-12">
                      {{ Form::submit('Mise à jour de mes préférences', array('class' => 'btn btn-success')) }}
                    </div>

                {!! Form::close() !!}

              </div>

          </div>
      </div>
  </div>
@endsection

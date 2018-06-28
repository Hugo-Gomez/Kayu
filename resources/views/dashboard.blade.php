@extends('layouts.structure')

@section('content')
<div class="page-title">
    <div class="title_left">
      <h1>Bonjour {{ $user->name }}</h1>
    </div>
  </div>
  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

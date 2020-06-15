@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">

<div class="panel-heading">
  <h2>{{ $user->name }}</h2>
<a href="/users" class="pull-right btn btn-primary">Svi korisnici</a>
</div>

<div class="panel-body">


          <ul class="list-group">
            <li class="list-group-item">
            Email: {{ $user->email }}
            </li>
            <li class="list-group-item">
              Uloga: {{ $user->role->name }}
            </li>


          </ul>


      </div>
  </div>
</div>
</div>

@endsection

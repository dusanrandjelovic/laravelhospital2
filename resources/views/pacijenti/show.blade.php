@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">

<div class="panel-heading">
  <h2>{{ $pacijent->ime }} {{ $pacijent->prezime }}</h2>
<a href="/asistent" class="pull-right btn btn-primary">Svi pacijenti</a>

</div>

<div class="panel-body">


          <ul class="list-group">
            <li class="list-group-item">
              Pol: {{ $pacijent->pol }}
            </li>
            <li class="list-group-item">
              Datum rodjenja: {{ $pacijent->datum_rodjenja }}
            </li>
            <li class="list-group-item">
              Adresa: {{ $pacijent->adresa }}
            </li>
            <li class="list-group-item">
              Doktor: {{ !empty($pacijent->user) ? $pacijent->user->name:'' }} 
            </li>
         <li class="list-group-item">
              Karton: {{ !empty($pacijent->karton) ? $pacijent->karton->id:'' }}
            </li>
          </ul>


      </div>
  </div>
</div>
</div>

@endsection

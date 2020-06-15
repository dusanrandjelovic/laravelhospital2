@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">

<div class="panel-heading">
  <p>{{ $karton->id }} | {{ $karton->pacijent->ime }} {{ $karton->pacijent->prezime }}</p>
<a href="/lekar" class="pull-right btn btn-primary">Pocetna</a>
</div>

<div class="panel-body">


          <ul class="list-group">
            <li class="list-group-item">
              Datum: {{ $karton->datum }}
            </li>
            <li class="list-group-item">
              Opis: {{ $karton->opis }}
            </li>
            <li class="list-group-item">
              Dijagnoze: {{ $karton->dijagnoze }}
            </li>
            <li class="list-group-item">
              Lekovi: {{ $karton->lekovi }}
            </li>

          </ul>


      </div>
  </div>
</div>
</div>

@endsection

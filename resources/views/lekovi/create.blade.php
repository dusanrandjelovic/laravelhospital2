@extends('layouts.app')

@section('content')

<div class="shopomotac">

<div class="shopsidebar">
  <p><a href="/asistent" class="btn btn-primary"><i class="far fa-check-circle"></i> Pacijenti</a></p>
        <p><a href="/lekovi" class="btn btn-primary"><i class="far fa-check-circle"></i> Lekovi</a></p>
        <p><a href="/dijagnoze" class="btn btn-primary"><i class="far fa-check-circle"></i> Dijagnoze</a></p>
              <p><a href="/kartoni" class="btn btn-primary"><i class="far fa-check-circle"></i> Kartoni</a></p>
</div>

 <div class="shopmain">

  <h1>Kreiraj lek</h1>

  @include('inc.messages')

  <div class="panel-body">
  {!! Form::open(['action' => 'LekController@store', 'method' => 'POST']) !!}   <!-- u notescontroler saljem i gadjam store metod da cuva podatke. Store komunicira i sa front i sa back-->
<div>
    <div>
    <label>Naziv</label>
    </div>
    {{ Form::text('naziv', '', ['id' => 'inputkon']) }}
  </div>
  <div>
      <div><label>Stanje (1 - na stanju; 2 - nije na stanju)</label></div>
    {{ Form::text('kolicina', '', ['id' => 'inputkon']) }}
</div>

  {{ Form::submit('Dodaj', ['class' => 'btn btn-primary']) }}

  {!! Form::close() !!}
  </div>

</div>
</div>

@endsection

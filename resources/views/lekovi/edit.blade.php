@extends('layouts.app')

@section('content')
<div class="shopomotac">

<div class="shopsidebar">
<p><a href="/asistent" class="btn btn-primary"><i class="far fa-check-circle"></i> Pacijenti</a></p>
        <p><a href="/lekovi" class="btn btn-primary"><i class="far fa-check-circle"></i> Lekovi</a></p>
        <p><a href="/dijagnoze" class="btn btn-primary"><i class="far fa-check-circle"></i> Dijagnoze</a></p>
              <p><a href="/kartoni" class="btn btn-primary"><i class="far fa-check-circle"></i> Kartoni</a></p>
              </div>


        <div class="shopmain justify-content-center">
@include('inc.messages')

<p>Promeni podatke o leku</p>


<div class="panel-body">
{!! Form::open(['action' => ['LekController@update', $lek->id], 'method' => 'POST']) !!}   <!-- u notescontroler saljem i gadjam store metod da cuva podatke. Store komunicira i sa front i sa back-->
<div>
  {{ Form::text('naziv', $lek->naziv, ['id' => 'inputkon']) }}
</div>
<div>
  {{ Form::text('kolicina', $lek->kolicina, ['id' => 'inputkon']) }}
</div>

<!-- upisuje podatke na server put i pravi izmenu-->
  {{ Form::hidden('_method', 'PUT') }}

{{ Form::submit('Azuriraj', ['class' => 'btn btn-primary']) }}

{!! Form::close() !!}
</div>



</div>
</div>



@endsection

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

  <div class="row justify-content-center">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
  <div class="panel-heading"><p>Promeni podatke o pacijentu</p>
<p>{{$pacijent->ime}} {{$pacijent->prezime}} - {{ !empty($pacijent->user) ? $pacijent->user->name:'Nije izabran lekar'}}</p>
  </div>
@include('inc.messages')

<div class="panel-body">
{!! Form::open(['action' => ['PacijentController@update', $pacijent->id], 'method' => 'POST']) !!}   <!-- u notescontroler saljem i gadjam store metod da cuva podatke. Store komunicira i sa front i sa back-->
<div>
  {{ Form::text('ime', $pacijent->ime, ['id' => 'inputkon']) }}
</div>
<div>
  {{ Form::text('prezime', $pacijent->prezime, ['id' => 'inputkon']) }}
</div>
  <div>
  {{ Form::text('pol', $pacijent->pol, ['id' => 'inputkon']) }}
</div>
<div>
  {{ Form::text('datum_rodjenja', $pacijent->datum_rodjenja, ['id' => 'inputkon']) }}
</div>
<div>
  {{ Form::text('adresa', $pacijent->adresa, ['id' => 'inputkon']) }}
</div>
   <div class="form-group">
  <label for="user_id">Doktor</label>
             <select name="user_id" id="inputkon">
                 <option value="" disabled selected>-- Lekar --</option>
                @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
             </select>
  </div>

<!-- upisuje podatke na server put i pravi izmenu-->
  {{ Form::hidden('_method', 'PUT') }}

{{ Form::submit('Azuriraj', ['class' => 'btn btn-primary']) }}

{!! Form::close() !!}
</div>
</div>
</div>
</div>

</div><!--main-->
</div><!--omotac-->


@endsection

@extends('layouts.app')

@section('content')

<div class="shopomotac">

<div class="shopsidebar">
<p><a href="/management/register" class="btn btn-primary"><i class="far fa-check-circle"></i> Dodaj korisnika</a></p>
           <p><a href="/users" class="btn btn-primary"><i class="far fa-check-circle"></i> Korisnici</a></p>
           <p><a href="{{ route('role.index') }}" class="btn btn-primary"><i class="far fa-check-circle"></i> Uloge</a></p>

</div>



<div class="shopmain">
  @include('inc.messages')
  <div class="row justify-content-center">
      <div class="col-md-8 col-md-offset-2">

          <div class="panel panel-default">
  <div class="panel-heading"><h3>Promeni podatke o ulozi</h3>

  </div>

@include('inc.messages')
<div class="panel-body">
{!! Form::open(['action' => ['RoleController@update', $role->id], 'method' => 'POST']) !!}   <!-- u notescontroler saljem i gadjam store metod da cuva podatke. Store komunicira i sa front i sa back-->
<div>
  {{ Form::text('name', $role->name, ['id' => 'inputkon']) }}
</div>


<!-- upisuje podatke na server put i pravi izmenu-->
  {{ Form::hidden('_method', 'PUT') }}

{{ Form::submit('Azuriraj', ['class' => 'btn btn-primary']) }}

{!! Form::close() !!}
</div>
</div>
</div>
</div>

</div>
</div>

@endsection

@extends('layouts.app')

@section('content')
<div class="shopomotac">

<div class="shopsidebar">
  <p><a href="/management/register" class="btn btn-primary"><i class="far fa-check-circle"></i> Dodaj korisnika</a></p>
             <p><a href="/users" class="btn btn-primary"><i class="far fa-check-circle"></i> Korisnici</a></p>
          <!--   <p><a href="{{ route('role.index') }}" class="btn btn-primary"><i class="far fa-check-circle"></i> Uloge</a></p> -->

       </div>

       <div class="shopmain">

  <div class="row justify-content-center">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
  <div class="panel-heading"><h2>Promeni podatke: {{$user->name}} - {{$user->role->name}}</h2>

  </div>
@include('inc.messages')

<div class="panel-body">
{!! Form::open(['action' => ['UserController@update', $user->id], 'method' => 'POST']) !!}   <!-- u notescontroler saljem i gadjam store metod da cuva podatke. Store komunicira i sa front i sa back-->
<div>
  {{ Form::text('name', $user->name, ['id' => 'inputkon']) }}
</div>
<div>
  {{ Form::text('email', $user->email, ['id' => 'inputkon']) }}
</div>
<div class="form-group">
<label for="role_id">Uloga</label>
          <select name="role_id" id="inputkon">
            <option value="" disabled selected>-- Uloga --</option>
             @foreach($roles as $role)
               <option value="{{ $role->id }}">{{ $role->name }}</option>
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

</div>
</div>
@endsection

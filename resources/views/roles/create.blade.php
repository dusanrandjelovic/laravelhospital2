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

  <h2>Kreiraj ulogu</h2>


  <div class="panel-body">
  {!! Form::open(['action' => 'RoleController@store', 'method' => 'POST']) !!}   <!-- u notescontroler saljem i gadjam store metod da cuva podatke. Store komunicira i sa front i sa back-->
<div>
    {{ Form::text('name', '', ['id' => 'inputkon'])}}
</div>


  {{ Form::submit('Dodaj', ['class' => 'btn btn-primary']) }}

  {!! Form::close() !!}
  </div>

</div>
</div>

@endsection

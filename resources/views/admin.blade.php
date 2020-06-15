@extends('layouts.app')

@section('content')

<div class="shopomotac">

<div class="shopsidebar">
  <p><a href="/management/register" class="btn btn-primary"><i class="far fa-check-circle"></i> Dodaj korisnika</a></p>
           <p><a href="/users" class="btn btn-primary"><i class="far fa-check-circle"></i> Korisnici</a></p>
         <!--  <p><a href="{{ route('role.index') }}" class="btn btn-primary"><i class="far fa-check-circle"></i> Uloge</a></p> -->
</div>

<div class="shopmain">

@include('inc.messages')
<h1>Ulogovani ste kao Admin</h1>
<p>Možete registrovati nove korisnike.</p>
<p>Možete videti spisak trenutnih korisnika, menjati njihove podatke i brisati korisnike.</p>



<div class="spisakzaposlenih">

  <div class="zaposleniomotac">
<h1>{{$doktori}}</h1>
<h2>Doktori</h2>
</div>

<div class="zaposleniomotac">
<h1>{{$asistenti}}</h1>
<h2>Asistenti</h2>
</div>

<div class="zaposleniomotac">
<h1>{{$pacijenti}}</h1>
<h2>Pacijenti</h2>
</div>

</div>




</div><!--main-->
</div><!-- omotac -->
@endsection

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

  <h1>Kreiraj pacijenta</h1>
@include('inc.messages')

  <form action="/pacijenti/submit" method="POST">
  {{ csrf_field() }}
  <div class="form-group">
  <label for="ime"></label>
             <input type="text" name="ime" placeholder="Ime" id="inputkon">
  </div>
  <div class="form-group">
  <label for="prezime"></label>
             <input type="text" name="prezime" value="" placeholder="Prezime" id="inputkon">
  </div>

  <div class="form-group">
  <label for="pol"></label>
             <input type="text" name="pol" placeholder="Pol" id="inputkon">
  </div>
  <div class="form-group">
  <label for="datum_rodjenja"></label>
             <input type="text" name="datum_rodjenja" placeholder="Datum rodjenja" id="inputkon">
  </div>

  <div class="form-group">
  <label for="adresa"></label>
             <input type="text" name="adresa" placeholder="Adresa" id="inputkon">
  </div>



  <div class="form-group">
  <label for="user_id"></label>
             <select name="user_id" id="inputkon">
               <option selected="true" disabled="disabled">-- Doktor --</option>
                @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
             </select>
  </div>

  <div>
             <button type="submit" name="submit" class="btn btn-primary">Kreiraj</button>
           </div>

  </form>

</div>
</div>

@endsection

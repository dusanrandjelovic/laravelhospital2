@extends('layouts.app')

@section('content')
<div class="shopomotac">

<div class="shopsidebar">
<p><a href="/asistent" class="btn btn-primary"><i class="far fa-check-circle"></i> Pacijenti</a></p>
        <p><a href="/lekovi" class="btn btn-primary"><i class="far fa-check-circle"></i> Lekovi</a></p>
        <p><a href="/dijagnoze" class="btn btn-primary"><i class="far fa-check-circle"></i> Dijagnoze</a></p>
              <p><a href="/kartoni" class="btn btn-primary"><i class="far fa-check-circle"></i> Kartoni</a></p>

       <div>

       <form action="/searchpacijentkarton" method="get">
       <div class="form-group">
       <input type="search" class="form-control" name="searchpacijentkarton" placeholder="Nadji pacijenta...">
       </div>
       <div class="form-group">
       <button class="btn btn-primary" type="submit">Pretraga</button>
       </div>
       </form>
       </div>

        <p><a href="/kartoni/create">Reset</a></p>


</div>

 <div class="shopmain">

  <h2>Kreiraj karton</h2>

  @include('inc.messages')

  <form action="/kartoni/submit" method="POST">
  {{ csrf_field() }}
  <!--<div class="form-group">
  <label for="opis"></label>
  <textarea name="opis" rows="8" cols="80" placeholder="Opis"></textarea>
  </div>

  <div class="form-group">
  <label for="datum"></label>
             <input type="text" name="datum" placeholder="Datum kreiranja" id="inputrez">
  </div>-->

  <div class="form-group">
  <label for="pacijent_id">Pacijent</label>
             <select name="pacijent_id" id="inputkon">
               <option selected="true" disabled="disabled">-- Pacijent --</option>
                @foreach($pacijenti as $pacijent)
                  <option value="{{ $pacijent->id }}">{{ $pacijent->ime }} {{ $pacijent->prezime}} - {{ !empty($pacijent->karton) ? $pacijent->karton->id:'' }} </option>
                @endforeach
             </select>
  </div>


  <div>
             <button type="submit" name="submit" class="btn btn-primary">Send</button>
           </div>

  </form>




</div>
</div>

@endsection

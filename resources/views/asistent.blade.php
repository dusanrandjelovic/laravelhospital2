@extends('layouts.app')

@section('content')

<div class="shopomotac">

<div class="shopsidebar">
     <p><a href="/asistent" class="btn btn-primary"><i class="far fa-check-circle"></i> Pacijenti<a></p>
    <p><a href="/lekovi" class="btn btn-primary"><i class="far fa-check-circle"></i> Lekovi<a></p>
    <p><a href="/dijagnoze" class="btn btn-primary"><i class="far fa-check-circle"></i> Dijagnoze<a></p>
          <p><a href="/kartoni" class="btn btn-primary"><i class="far fa-check-circle"></i> Kartoni<a></p>
     <!--     <p><a href="/kartoni/create" class="btn btn-primary"><i class="far fa-check-circle"></i> Dodaj karton</a></p>-->

          <div>

          <form action="/searchpacijent" method="get">
          <div class="form-group">
          <input type="search" class="form-control" name="searchpacijent" placeholder="Pretraga pacijenata...">
          </div>
          <div class="form-group">
          <button class="btn btn-primary" type="submit">Pretraga</button>
          </div>
          </form>
          </div>

     



</div>
<div class="shopmain">
@include('inc.messages')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ulogovani ste kao asistent
  <a href="/pacijenti/create" class="btn btn-primary">Dodaj pacijenta</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if(count($pacijenti)>0)
                                    <div style="overflow-x:auto;">
                                    <table class="table table-striped">
                                    <tr>
                                    <th>Pacijent</th>
                                    <th>Karton</th>
                                    <th>Doktor</th>
                                    <th></th>
                                    <th></th>

                                    </tr>
                                    @foreach($pacijenti as $pacijent)
                                    <tr>
                                    <td><a href="/pacijenti/{{$pacijent->id}}">{{ $pacijent->ime }} {{ $pacijent->prezime }}</a></td>
                                    <td>{{ !empty($pacijent->karton) ? $pacijent->karton->id:'' }}</td>
                                    <td>{{ !empty($pacijent->user) ? $pacijent->user->name:'' }}</td>

                  <td><a href="/pacijenti/{{ $pacijent->id }}/edit" class="btn btn-primary">Izmeni</a></td>
                             <td>
                             {!! Form::open(['action' => ['PacijentController@destroy', $pacijent->id], 'method' => 'POST',
                             'onsubmit' => 'return confirm("Da li ste sigurni?")']) !!}   <!-- u notescontroler saljem i gadjam destroy da brisem-->

                {{ Form::hidden('_method', 'DELETE') }}

                {{ Form::submit('Obrisi', ['class' => 'btn btn-danger']) }}

                {!! Form::close() !!}
                             </td>

                                    </tr>
                                    @endforeach
                                    </table>
                </div>
                                    @else
                                    <p>Nema pacijenta.</p>

                                    @endif

                </div>
            </div>
              {{$pacijenti->links()}}
        </div>
    </div>
</div>

</div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="shopomotac">
    <div class="shopsidebar">
   <p><a href="/asistent" class="btn btn-primary"><i class="far fa-check-circle"></i> Pacijenti</a></p>
        <p><a href="/lekovi" class="btn btn-primary"><i class="far fa-check-circle"></i> Lekovi</a></p>
        <p><a href="/dijagnoze" class="btn btn-primary"><i class="far fa-check-circle"></i> Dijagnoze</a></p>
              <p><a href="/kartoni" class="btn btn-primary"><i class="far fa-check-circle"></i> Kartoni</a></p>


              <div>
              <p>Pretraga po broju kartona</p>

              <form action="/searchkarton" method="get">
              <div class="form-group">
              <input type="search" class="form-control" name="searchkarton" placeholder="Pretraga...">
              </div>
              <div class="form-group">
              <button class="btn btn-primary" type="submit">Pretraga</button>
              </div>
              </form>
              </div>



    </div>

    <div class="shopmain">
        @include('inc.messages')

    <div class="row justify-content-center">
        <div class="col-md-8">

          <div class="card">
              <div class="card-header"><h3>Kartoni</h3>
              <a href="/kartoni/create" class="btn btn-primary">Dodaj karton</a>

              </div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  @if(count($kartoni) > 0)
                  <div style="overflow-x:auto;">
                 <table class="table table-striped">
                  <tr>
                    <th>Broj kartona</th>
                    <th>Pacijent</th>
                  <th>Doktor</th>
                  <th></th>

                  </tr>
                  @foreach($kartoni as $karton)
                  <tr>
                    <td><a href="/asistentkartoni/{{$karton->id}}">{{ $karton->id }}</a></td>
                   <td>{{ !empty($karton->pacijent) ? $karton->pacijent->ime:'' }} {{ !empty($karton->pacijent) ? $karton->pacijent->prezime:'' }}</td>
                   <td>{{ !empty($karton->pacijent->user) ? $karton->pacijent->user->name:'' }}</td>

                        <td>
                   {!! Form::open(['action' => ['AsistentController@destroy', $karton->id], 'method' => 'POST',
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
                 <p>Nema kartona.</p>
               @endif


              </div>
          </div>

{{ $kartoni->links() }}


        </div>
    </div>
</div>
</div>
@endsection

@extends ("layouts.app")


@section('content')

<div class="shopomotac">

<div class="shopsidebar">
<p><a href="/asistent" class="btn btn-primary"><i class="far fa-check-circle"></i> Pacijenti</a></p>
        <p><a href="/lekovi" class="btn btn-primary"><i class="far fa-check-circle"></i> Lekovi</a></p>
        <p><a href="/dijagnoze" class="btn btn-primary"><i class="far fa-check-circle"></i> Dijagnoze</a></p>
              <p><a href="/kartoni" class="btn btn-primary"><i class="far fa-check-circle"></i> Kartoni</a></p>
     

<div>

<form action="/searchlek" method="get">
<div class="form-group">
<input type="search" class="form-control" name="searchlek" placeholder="Pretraga lekova...">
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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Lekovi

    <a href="/lekovi/create" class="pull-right btn btn-primary">Dodaj lek</a>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if(count($lekovi))
                      <table class="table table-striped">
                       <tr>
                         <th>Naziv</th>
                         <th>Stanje</th>
                         <th>Izmeni</th>
                         <th>Obrisi</th>
                       </tr>
                       @foreach($lekovi as $lek)
                       <tr>
                         <td>{{ $lek->naziv }}</td>
                         <td>{{ $lek->kolicina}}</td>
                         <td><a href="/lekovi/{{ $lek->id }}/edit" class="btn btn-primary">Edit</a></td>
                         <td>
                           {!! Form::open(['action' => ['LekController@destroy', $lek->id],
                           'method' => 'POST',
                           'onsubmit' => 'return confirm("Da li ste sigurni?")']) !!}
                           <!-- u notescontroler saljem i gadjam destroy da brisem
                         iz varijable $contact uzimam id onog kontakta koji se edituje-->


                           <!-- upisuje podatke na server put i pravi izmenu-->
                             {{ Form::hidden('_method', 'DELETE') }}

                           {{ Form::submit('Obrisi', ['class' => 'btn btn-danger']) }}

                           {!! Form::close() !!}
                         </td>
                       </tr>
                       @endforeach
                      </table>
                      @else
                      <p>Nema leka.</p>
                    @endif
                  1 - Na stanju.
                  2 - Nije na stanju.

                    {{$lekovi->links()}}
                </div>

            </div>
        </div>
    </div>

    </div><!--shopmain-->
    </div><!--shopomotac-->
@endsection

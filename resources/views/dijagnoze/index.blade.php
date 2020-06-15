@extends ("layouts.app")


@section('content')

<div class="shopomotac">

<div class="shopsidebar">
<p><a href="/asistent" class="btn btn-primary"><i class="far fa-check-circle"></i> Pacijenti</a></p>
        <p><a href="/lekovi" class="btn btn-primary"><i class="far fa-check-circle"></i> Lekovi</a></p>
        <p><a href="/dijagnoze" class="btn btn-primary"><i class="far fa-check-circle"></i> Dijagnoze</a></p>
              <p><a href="/kartoni" class="btn btn-primary"><i class="far fa-check-circle"></i> Kartoni</a></p>

<div>

<form action="/searchdijagnoza" method="get">
<div class="form-group">
<input type="search" class="form-control" name="searchdijagnoza" placeholder="Pretraga dijagnoze...">
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
                <div class="panel-heading">Dijagnoze

    <a href="/dijagnoze/create" class="pull-right btn btn-primary">Dodaj dijagnozu</a>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if(count($dijagnoze))
                      <table class="table table-striped">
                       <tr>
                         <th>Naziv</th>
                         <th>Izmeni</th>
                         <th>Obrisi</th>
                       </tr>
                       @foreach($dijagnoze as $dijagnoza)
                       <tr>
                         <td>{{ $dijagnoza->naziv }}</td>
                         <td><a href="/dijagnoze/{{ $dijagnoza->id }}/edit" class="btn btn-primary">Edit</a></td>
                         <td>
                           {!! Form::open(['action' => ['DijagnozaController@destroy', $dijagnoza->id],
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
                      <p>Nema dijagnoza.</p>
                    @endif


                    {{$dijagnoze->links()}}
                </div>

            </div>
        </div>
    </div>

    </div><!--shopmain-->
    </div><!--shopomotac-->
@endsection

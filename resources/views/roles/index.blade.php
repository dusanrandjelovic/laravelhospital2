@extends ("layouts.app")


@section('content')
@include('inc.messages')
<div class="shopomotac">

<div class="shopsidebar">
<p><a href="/management/register" class="btn btn-primary"><i class="far fa-check-circle"></i> Dodaj korisnika</a></p>
           <p><a href="/users" class="btn btn-primary"><i class="far fa-check-circle"></i> Korisnici</a></p>
           <p><a href="{{ route('role.index') }}" class="btn btn-primary"><i class="far fa-check-circle"></i> Uloge</a></p>

</div>



<div class="shopmain">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Uloge</h2>

    <a href="/roles/create" class="pull-right btn btn-primary">Dodaj ulogu</a>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if(count($roles))
                      <table class="table table-striped">
                       <tr>
                         <th>Naziv</th>
                         <th>Izmeni</th>
                         <th>Obrisi</th>
                       </tr>
                       @foreach($roles as $role)
                       <tr>
                         <td>{{ $role->name }}</td>

                         <td><a href="/roles/{{ $role->id }}/edit" class="btn btn-primary">Edit</a></td>
                         <td>
                           {!! Form::open(['action' => ['RoleController@destroy', $role->id],
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
                    @endif



                </div>

            </div>
        </div>
    </div>

    </div><!--shopmain-->
    </div><!--shopomotac-->
@endsection

@extends ("layouts.app")


@section('content')

<div class="shopomotac">

<div class="shopsidebar">

<p><a href="/management/register" class="btn btn-primary"><i class="far fa-check-circle"></i> Dodaj korisnika</a></p>
           <p><a href="/users" class="btn btn-primary"><i class="far fa-check-circle"></i> Korisnici</a></p>
        

<div>

<form action="/searchuser" method="get">
<div class="form-group">
<input type="search" class="form-control" name="searchuser" placeholder="Pretraga korisnika...">
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
              @include('inc.messages')
                <div class="card-header">Korisnici</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($users))
                      <table class="table table-striped">
                       <tr>
                         <th>Korisnik</th>
                         <th>Uloga</th>
                         <th></th>
                         <th></th>
                       </tr>
                       @foreach($users as $user)
                       <tr>
                         <td><a href="/users/{{ $user->id }}">{{ $user->name }}</a></td>
                         <td>{{ $user->role->name }}</td>
                         <td><a href="/users/{{ $user->id }}/edit" class="btn btn-primary">Edit</a></td>
                         <td>
                           {!! Form::open(['action' => ['UserController@destroy', $user->id],
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
                      <p>Nema korisnika.</p>
                    @endif


                </div>
            </div>



            {{$users->links()}}
        </div>
    </div>
</div>

    </div><!--shopmain-->
    </div><!--shopomotac-->
@endsection

@extends('layouts.app')

@section('content')

<div class="shopomotac">

<div class="shopsidebar">

  <div>

  <form action="/searchdoktorovpacijent" method="get">
  <div class="form-group">
  <input type="search" class="form-control" name="searchdoktorovpacijent" placeholder="Pretraga pacijenata...">
  </div>
  <div class="form-group">
  <button class="btn btn-primary" type="submit">Pretraga</button>
  </div>
  </form>
  </div>

   <p><a href="/lekar">Reset</a></p>



</div>
<div class="shopmain">
    @include('inc.messages')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lekar Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @if(count($pacijenti) > 0)
                                     <table class="table table-striped">
                                      <tr>
                                        <th>Ime</th>
                                        <th>Pol</th>
                                        <th>Karton</th>
                                        <th></th>

                                      </tr>
                                      @foreach($pacijenti as $pacijent)
                                      <tr>
                                        <td><a href="/doktorpacijenti/{{$pacijent->id}}">{{ $pacijent->ime }} {{$pacijent->prezime }}</a></td>
                                        <td>{{ $pacijent->pol}}</td>
                                       <td><a href="/kartoni/{{ !empty($pacijent->karton) ? $pacijent->karton->id:'' }}">{{ !empty($pacijent->karton) ? $pacijent->karton->id:'' }}</a></td>

                                       <td><a href="/kartoni/{{ !empty($pacijent->karton) ? $pacijent->karton->id:'' }}/edit" class="btn btn-default">Izmeni karton</a></td>


                                      </tr>
                                      @endforeach
                                     </table>
                                     @else
                                     <p>Nema pacijenta.</p>
                                   @endif


                    You are logged in kao lekar!
                </div>
            </div>

            {{ $pacijenti->links() }}
        </div>
    </div>
</div>

</div><!--main-->
</div><!--omotac-->
@endsection

@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" rel="stylesheet" />

    <div class="container">

  <h1>Izmeni karton</h1>

  @include('inc.messages')


  <div class="panel-body">
  {!! Form::open(['action' => ['KartonController@update', $karton->id], 'method' => 'POST']) !!}   <!-- u notescontroler saljem i gadjam store metod da cuva podatke. Store komunicira i sa front i sa back-->
<div>
    {{ Form::textarea('opis', $karton->opis, ['id' => 'inputkon']) }}
  </div>
  <div>
    {{ Form::text('datum', $karton->datum, ['id' => 'inputkon']) }}
  </div>
 <!-- <div>
    {{ Form::text('pacijent_id', $karton->pacijent->id, ['id' => 'inputkon']) }}
  </div>-->
  <div>
      <input type="hidden" name="pacijent_id" value="{{$karton->pacijent_id}}">
  </div>

  <li class="list-group-item">
              Dijagnoze: {{ $karton->dijagnoze }}
            </li>
            
             <div class="form-group">
           <select class="js-example-theme-multiple" name="dijagnoze[]"  multiple="multiple" id="dijag">
              @foreach($dijagnoze as $dijagnoza)
                <option value="{{ $dijagnoza['naziv'] }}">{{ $dijagnoza->naziv }}</option>
              @endforeach
           </select>
</div>
            
       <!--     <div class="form-group">
          @foreach($dijagnoze as $dijagnoza)
<input type="checkbox" name="dijagnoze[]" id="inputkon"  value="{{ $dijagnoza['naziv'] }}">{{$dijagnoza->naziv}}
  @endforeach
</div> -->



  <li class="list-group-item">
    Lekovi: {{ $karton->lekovi }}
  </li>

<div class="form-group">
    <select class="js-example-basic-multiple" name="lekovi[]" multiple="multiple" id="inputkon">
     @foreach($lekovi as $lek)
     <option value="{{$lek['naziv']}}">{{$lek->naziv}}</option>
     @endforeach
     </select>
</div>

<!--
<div class="form-group">
          @foreach($lekovi as $lek)
<input type="checkbox" name="lekovi[]" id="inputkon"  value="{{ $lek['naziv'] }}">{{$lek->naziv}}
  @endforeach
</div>  -->


<!--
<div class="form-group">
<label for="lekovi">Lekovi</label>
           <select name="lekovi" id="inputkon">
               <option value="Nije izabrano">-- Izaberi lek --</option>
              @foreach($lekovi as $lek)
                <option value="{{ $lek->naziv }}">{{ $lek->naziv }}</option>
              @endforeach
           </select>
</div>
-->

  <!-- upisuje podatke na server put i pravi izmenu-->
    {{ Form::hidden('_method', 'PUT') }}

  {{ Form::submit('Azuriraj', ['class' => 'btn btn-primary']) }}

  {!! Form::close() !!}
  </div>


</div>


<div class="razmakdole"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
    <script type="text/javascript">
   $(document).ready(function() {
   $('.js-example-theme-multiple').select2({
      placeholder: 'Izaberite dijagnozu'
    });
    $('.js-example-basic-multiple').select2({
      placeholder: 'Izaberite lek'
    });
});
    </script>
@endsection

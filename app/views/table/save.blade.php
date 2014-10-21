@section('head')
{{HTML::script('js/functions.js')}}
@stop
<div class="row">
<div class="col-md-8">
  <div class="widget">
     <div class="widget-content-white glossed">
     <div class="padded">
<h1> Mesas </h1>
<div class='errors_form'></div>
    {{ Form::open(array('url' => 'tables/create/' . $table->id, 'id'=>'form')) }}
    <input type="hidden" class="form-control" id= 'link' value='tables'>
    <div class="form-group">
       {{ Form::label ('number', 'Numero') }}
       {{ Form::text ('number', $table->number, array('class'=>'form-control','placeholder'=>'numero', 'autocomplete'=>'of')) }}
    </div>
    <div class="form-group">
       {{ Form::label ('quantity', 'Cantidad de personas') }}
       {{ Form::text ('seats', $table->seats, array('class'=>'form-control','placeholder'=>'cantidad de personas', 'autocomplete'=>'of')) }} 
     </div>
    <div class="form-group">
       {{ Form::label ('description', 'Descripcion') }}
       {{ Form::text ('description', $table->description, array('class'=>'form-control','placeholder'=>'Descripcion', 'autocomplete'=>'of')) }} 
     </div>
       {{ Form::submit('Guardar mesa',array('class'=>'btn btn-success')) }}
       {{ link_to('tables', 'Cancelar') }}
    {{ Form::close() }}
</div>
</div>
</div>
</div>
<div class="col-md-4">
</div>
</div>
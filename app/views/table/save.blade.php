<div id='errors_form'></div>
    {{ Form::open(array('url' => 'tables/create', 'id'=>'form')) }}
    <input type="hidden" name="id_table" id="id_table" value="{{$table->id}}">
    <div class="form-group">
       {{ Form::label ('number', 'Numero') }}
       {{ Form::text ('number', $table->number, array('class'=>'form-control','placeholder'=>'Numero', 'autocomplete'=>'of')) }}
    </div>
    <div class="form-group">
       {{ Form::label ('quantity', 'Cantidad de personas') }}
       {{ Form::text ('seats', $table->seats, array('class'=>'form-control','placeholder'=>'Cantidad de personas', 'autocomplete'=>'of')) }} 
     </div>
    <div class="form-group">
       {{ Form::label ('description', 'Descripcion') }}
       {{ Form::text ('description', $table->description, array('class'=>'form-control','placeholder'=>'Descripcion', 'autocomplete'=>'of')) }} 
     </div>
       <div class="modal-footer">        
       <a href="javascript:eliminar({{$table->id}})" id="delete" class="btn btn-danger">Eliminar</a>
       <button type="button" onclick="guardarMesa()" class="btn btn-primary">Guardar Mesa</button>     
      </div>       
    {{ Form::close() }}
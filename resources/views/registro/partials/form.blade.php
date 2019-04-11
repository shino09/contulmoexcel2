<div class="row">
	<div class="col-md-8">
    <div class="form-group"><br>
    	{{ Form::label('fichero', 'Fichero Origen:', ['class' => ' control-label']) }}
    		{{ Form::file('excel', ['class' => 'form-control','id' => 'file']) }}
    	<!-- {{ Form::reset('Cancelar', ['class' => 'btn btn-info']) }} -->
        <br>
  
    </div>
      </div>
                        </div>

    <div class="row">

        <div class="col-md-4">

    <div class="form-group"><br>

        {{ Form::submit('Subir Fichero', ['class' => 'btn btn-lg btn-primary pull-right', 'id' => 'request', 'onclick' => 'comprueba_extension(this.form, this.form.excel.value)'])}}
  </div>
      </div>




</div>



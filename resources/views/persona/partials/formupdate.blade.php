<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
			{{ Form::label('nombre', 'Nombre') }}
			{{ Form::text('nombre',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'NOMBRE COMPLETO']) }}
			@if ($errors->has('nombre'))
				<span class="help-block">
					<strong>{{ $errors->first('nombre') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
			{{ Form::label('apellido', 'Apellido') }}
			{{ Form::text('apellido', null,['class'=> 'form-control', 'placeholder'=>'APELLIDO DE LA PERSONA']) }}
			@if ($errors->has('apellido'))
				<span class="help-block">
					<strong>{{ $errors->first('apellido') }}</strong>
				</span>
			@endif
		</div>
	</div>


</div>


<div class="row">
		<div class="col-md-6">
		<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
			{{ Form::label('telefono', 'Telefono') }}
			{{ Form::text('telefono', null,['class'=> 'form-control', 'placeholder'=>'TELEFONO DE LA PERSONA']) }}
			@if ($errors->has('telefono'))
				<span class="help-block">
					<strong>{{ $errors->first('telefono') }}</strong>
				</span>
			@endif
		</div>
	</div>
		<div class="col-md-6">
				<div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">   
  					<label for="date">Fecha</label>
					<input type="text" id="fecha" class="form-control datepicker" value="{{ $persona->fecha}}" name="fecha">
                    @if ($errors->has('fecha'))
						<span class="help-block">
						<strong>{{ $errors->first('fecha') }}</strong>
						</span>
					@endif
                </div>
            </div>
  
</div>


         <!-- <div class="row">

	<div class="col-md-6">
		<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
			{{ Form::label('file', 'Archivo PDF') }}
			{{ Form::file('file', ['class'=> 'form-control',  'accept'=>'.pdf','name'=>'file','placeholder'=>'ARCHIVO PDF ']) }}
			@if ($errors->has('file'))
				<span class="help-block">
					<strong>{{ $errors->first('file') }}</strong>
				</span>
			@endif
		</div>
	</div>
</div>-->

<?php if($persona->file!= NULL){  ?> 

        
		<div class="col-md-6">
			  <label for="mostrarpdf">Archivo PDF actual: ({{ $persona->file }})</label>

 <embed id="mostrarpdf"
    src="{{ action('PersonaController@getDocument', ['id'=> $persona->id]) }}"
    style="width:400px; height:400px;"
    frameborder="0">

</div>
<?php } ?> 




     <?php if($persona == null) { ?>

              <div class="row">
		<div class="col-md-6">
		<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">    <label for="link">Archivo PDF actual: ()</label>


                <input type="file" class="form-control"  accept=".pdf" name="file" /> 
                @if ($errors->has('file'))
				<span class="help-block">
					<strong>{{ $errors->first('file') }}</strong>
				</span>
			@endif
              </div>
            </div>
            </div>
      			<?php  }?> 


             <?php if($persona != null) { ?>

          <div class="row">
		<div class="col-md-6">
		<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">    <label for="link">Archivo PDF nuevo</label>


                <input type="file" class="form-control"  accept=".pdf" name="file" value="{{ old('file', $persona->file)}}"/> 
                @if ($errors->has('file'))
				<span class="help-block">
					<strong>{{ $errors->first('file') }}</strong>
				</span>
			@endif
              </div>
            </div>
            </div>
      
     
			<?php  }?> 



<div class="form-group text-center">
		<a href="{{ route('persona.index') }}" class="btn btn-flat btn-danger">CANCELAR</a>

	{{ Form::submit('GUARDAR', ['class'=>'btn btn-flat btn-primary']) }}
</div>





    
@section('css')
	<!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
	<!-- iCheck -->
	<link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />

	  <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('css/datepicker3.css')}}">
        <link rel="stylesheet" href="{{asset('css/datepicker.css')}}">
@endsection

@section('scripts')
	<!-- iCheck -->
	<script src="{{ asset('plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
	<!-- Select2 -->
	<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
	    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>

	<script>
		$(function(){
				$(".select").select2();
				$('input').iCheck({
					checkboxClass: 'icheckbox_square-blue',
					radioClass: 'iradio_square-blue',
					increaseArea: '20%' // optional
				});
		})
	</script>

		<script>
    $('.datepicker').datepicker({
      //  format: "dd/mm/yyyy",
                format: "yyyy/mm/dd",

        language: "es",
        autoclose: true
    });
</script>
@endsection
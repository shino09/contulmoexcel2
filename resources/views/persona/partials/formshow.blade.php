<div class="row">
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
			{{ Form::label('nombre', 'Nombre') }}
			{{ Form::text('nombre',null,['class'=> 'form-control text-uppercase', 'placeholder'=>'NOMBRE COMPLETO', 'disabled']) }}
			
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
			{{ Form::label('apellido', 'Apellido') }}
			{{ Form::text('apellido', null,['class'=> 'form-control', 'placeholder'=>'APELLIDO DE LA PERSONA', 'disabled']) }}
			
		</div>
	</div>
</div>
<div class="row">
		<div class="col-md-6">
		<div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
			{{ Form::label('telefono', 'Telefono') }}
			{{ Form::text('telefono', null,['class'=> 'form-control', 'placeholder'=>'TELEFONO DE LA PERSONA', 'disabled']) }}
			
		</div>
	</div>
  

			<div class="col-md-6">
				<div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">   
  					<label for="date">Fecha</label>
					<input type="text" id="fecha" class="form-control datepicker" readonly value="{{ $persona->fecha}}" name="fecha">
                    @if ($errors->has('fecha'))
						<span class="help-block">
						<strong>{{ $errors->first('fecha') }}</strong>
						</span>
					@endif
                </div>
            </div>
</div>

<?php if($persona->file!= NULL){  ?> 


<div class="row">



	<div class="col-md-6">
			  <label for="mostrarpdf">Archivo PDF actual: ({{ $persona->file }})</label>

 <embed id="mostrarpdf"
    src="{{ action('PersonaController@getDocument', ['id'=> $persona->id]) }}"
    style="width:400px; height:400px;"
    frameborder="0"
>

</div>
	</div>
<?php } ?> 




<div class="form-group text-center">
	<a href="{{ route('persona.index') }}" class="btn btn-flat btn-danger">ATRAS</a>
</div>

@section('css')
	<!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
	<!-- iCheck -->
	<link href="{{ asset('/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
	<!-- iCheck -->
	<script src="{{ asset('plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>
	<!-- Select2 -->
	<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
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
@endsection
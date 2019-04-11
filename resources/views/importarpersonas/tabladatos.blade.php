@extends('layouts.master')

@section('title')
    Importar Excel
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-users"></i>
		EXCEL
		<small>Importar Personas al  sistema</small>
	</h1>
@endsection




	@section('main-content')
	<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-list"></i> LISTA DE PERSONAS</h3>

	
	</div>
	<div class="box-body">
		 <p class="help-block">- Fijese que todos los campos sean validos</p>

            <p class="help-block">- Los recuadros en rojo marcan los errores</p>


		<!--<?php print_r($data);?>-->
		<div>
		{{ Form::open (['url' => 'importar-personas-validarform', 'method' => 'POST', 'class' => 'form-horizontal']) }}

		{!! csrf_field() !!}
		<br><a href="{{ route('persona.index') }}" class="btn btn-lg btn-primary btn-danger">Cancelar</a>
		{{ Form::submit('Procesar', ['class' => 'btn btn-lg btn-primary pull-right', 'id' => 'request'])}}
		<!-- <a href="#" class="btn btn-primary pull-right">Procesar</a> --><br><br>
		</div>

			<!-- <table class="table table-hover">
			<script>
		        console.log(value);
        	</script>
				<div id="tablecontent"></div>
				@
			</table> -->

		<div class="table-responsive">
			<table class="table table-striped">
	            <thead>
	                <tr>
	                	<th>#</th>
	                    <th>Nombre</th>
	                    <th>Apellido</th>
	                    <th>Telefono</th>
	                    <th>Fecha</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@foreach($data as $key => $value)

					<tr>
						<td>{!! $i = $value['id'] + 1 !!}</td>

					
						<td>
							<input type="text" size="10"  name="nombre[]" value="{!! $value['nombre'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['nombre'])) ? $errors[$value['id']]['nombre'] : '' }}" class="{{ (isset($errors[$value['id']]['nombre'])) ? 'form-control has-error' : '' }}">
						</td>

						<td>
							<input type="text" size="10"  name="apellido[]" value="{!! $value['apellido'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['apellido'])) ? $errors[$value['id']]['apellido'] : '' }}" class="{{ (isset($errors[$value['id']]['apellido'])) ? 'form-control has-error' : '' }}">
						</td>



						<td>
							<input type="text" size="10" name="telefono[]" value="{!! $value['telefono'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['telefono'])) ? $errors[$value['id']]['telefono'] : '' }}" class="{{ (isset($errors[$value['id']]['telefono'])) ? 'form-control has-error' : '' }}">
						</td>

						<?php if(($value['fecha'])!=NULL){?>

						<td>
							<input type="text" size="10" name="fecha[]" value="{!! $value['fecha'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['fecha'])) ? $errors[$value['id']]['fecha'] : '' }}" class="{{ (isset($errors[$value['id']]['fecha'])) ? 'form-control has-error' : '' }} datepicker">
						</td>
											<?php } ?>




						<?php if(($value['fecha'])==NULL){?>

						<td>
							<input type="text" size="10" name="fecha[]" value="{!! $value['fecha'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['fecha'])) ? $errors[$value['id']]['fecha'] : '' }}" class="{{ (isset($errors[$value['id']]['fecha'])) ? 'form-control has-error' : '' }} datepicker">
						</td>
											<?php } ?>

					<!--	<?php if(($value['fecha'])==NULL){?>

						<td>
							<input type="date" size="10" name="fecha[]" value="{!! $value['fecha'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['fecha'])) ? $errors[$value['id']]['fecha'] : '' }}" class="{{ (isset($errors[$value['id']]['fecha'])) ? 'form-control has-error' : '' }}">
						</td>
											<?php } ?>-->

					
					</tr>

					@endforeach

	                {{ Form::close() }}
		        </tbody>
	        </table>
	        </div>
	</div>
</div>


@endsection
@section('scripts')

	
	<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
		<!-- mi ajax -->
	<script type="text/javascript" src="{{ asset('js/mijs.js') }} "></script>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	
	<link rel="stylesheet" href="{{ asset('css/editablegrid/editablegrid.css') }}" type="text/css" media="screen">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/micss.css') }}">

     <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('css/datepicker3.css')}}">
        <link rel="stylesheet" href="{{asset('css/datepicker.css')}}">

    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('js/bootstrap-datepicker.es.js')}}"></script>

    
	<script>
    $('.datepicker').datepicker({
      // format: "dd/mm/yyyy",
       //format: "yyyy/mm/dd",
        format: "yyyy-mm-dd",


        language: "es",
        autoclose: true
    });


</script>
	@endsection
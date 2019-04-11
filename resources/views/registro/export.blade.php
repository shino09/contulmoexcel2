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
		
		<div>
		{{ Form::open (['url' => 'export', 'method' => 'POST', 'class' => 'form-horizontal']) }}

		{!! csrf_field() !!}
		<br><a href="{{ route('home') }}" class="btn btn-lg btn-primary btn-danger">Cancelar</a>
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
	                    <th>Albaran</th>
	                    <th>Destinatario</th>
	                    <th>Direccion</th>
	                    <th>Poblacion</th>
	                    <th>cpyutututyutyutyutyu</th>
	                    <th>Provincias</th>
	                    <th>Tlf</th>
	                    <th>Observaciones</th>
	                    <th>Fecha</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@foreach($data as $key => $value)

					<tr>
						<td>{!! $i = $value['id'] + 1 !!}</td>
						<td>
							<input type="text" size="10" id="{{ $value['id'] }}" name="albaran[]" value="{{ $value['albaran'] }}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['albaran'])) ? $errors[$value['id']]['albaran'] : '' }}" class="{{ (isset($errors[$value['id']]['albaran'])) ? 'form-control has-error' : '' }}">
						</td>

						<td>
							<input type="text" size="10"  name="destinatario[]" value="{!! $value['destinatario'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['destinatario'])) ? $errors[$value['id']]['destinatario'] : '' }}" class="{{ (isset($errors[$value['id']]['destinatario'])) ? 'form-control has-error' : '' }}">
						</td>

						<td>
							<input type="text" size="10"  name="direccion[]" value="{!! $value['direccion'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['direccion'])) ? $errors[$value['id']]['direccion'] : '' }}" class="{{ (isset($errors[$value['id']]['direccion'])) ? 'form-control has-error' : '' }}">
						</td>

						<td>
							<input type="text" size="10"  name="poblacion[]" value="{!! $value['poblacion'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['poblacion'])) ? $errors[$value['id']]['poblacion'] : '' }}" class="{{ (isset($errors[$value['id']]['poblacion'])) ? 'form-control has-error' : '' }}">
						</td>

						<td>
							<input type="text" size="10" name="cp[]" value="{!! $value['cp'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['cp'])) ? $errors[$value['id']]['cp'] : '' }}" class="{{ (isset($errors[$value['id']]['cp'])) ? 'form-control has-error' : '' }}">
						</td>

						<td>
							<input type="text" size="10" name="provincia[]" value="{!! $value['provincia'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['provincia'])) ? $errors[$value['id']]['provincia'] : '' }}" class="{{ (isset($errors[$value['id']]['provincia'])) ? 'form-control has-error' : '' }}">
						</td>

						<td>
							<input type="text" size="10" name="telefono[]" value="{!! $value['telefono'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['telefono'])) ? $errors[$value['id']]['telefono'] : '' }}" class="{{ (isset($errors[$value['id']]['telefono'])) ? 'form-control has-error' : '' }}">
						</td>

						<td>
							<input type="text" size="10" name="observaciones[]" value="{!! $value['observaciones'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['observaciones'])) ? $errors[$value['id']]['observaciones'] : '' }}" class="{{ (isset($errors[$value['id']]['observaciones'])) ? 'form-control has-error' : '' }}">
						</td>

						<td>
							<input type="date" size="10" name="fecha[]" value="{!! $value['fecha'] !!}" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="{{ (isset($errors[$value['id']]['fecha'])) ? $errors[$value['id']]['fecha'] : '' }}" class="{{ (isset($errors[$value['id']]['fecha'])) ? 'form-control has-error' : '' }}">
						</td>
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

	@endsection
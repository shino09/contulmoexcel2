@extends('layouts.master')

@section('title')
    Personas
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-users"></i>
		IMPORTAR PERSONAS
		<small>importar excel</small>
	</h1>
@endsection

@section('breadcrumbs')
{{ breadcrumbs('personaimportar') }}		
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-user-plus"></i> Importar persona desde excel</h3>
	</div>
	<div class="box-body">
		 <p class="help-block">- Debe elegir un archivo excel, cualquier otro tipo de archivo no sera aceptado.</p>

            <p class="help-block">- La extension del archivo debe ser solo .xls o .xlsx o cvs</p>


		{{ Form::open (['url' => 'importar-personas-llenarform', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}

			@include('importarpersonas.partials.form')
		{!! Form::close() !!}
    </div>

   
</div>

@endsection

@section('scripts')
	<script src="{{ asset('js/editablegrid/editablegrid.js') }}"></script>
	<!-- [DO NOT DEPLOY] --> <script src="{{ asset('js/editablegrid/editablegrid_renderers.js') }}" ></script>
	<!-- [DO NOT DEPLOY] --> <script src="{{ asset('js/editablegrid/editablegrid_editors.js') }}" ></script>
	<!-- [DO NOT DEPLOY] --> <script src="{{ asset('js/editablegrid/editablegrid_validators.js') }}" ></script>
	<!-- [DO NOT DEPLOY] --> <script src="{{ asset('js/editablegrid/editablegrid_utils.js') }}" ></script>
	<!-- [DO NOT DEPLOY] --> <script src="{{ asset('js/editablegrid/editablegrid_charts.js') }}" ></script>
	<link rel="stylesheet" href="{{ asset('css/editablegrid/editablegrid.css') }}" type="text/css" media="screen">
		<script type="text/javascript" src="{{ asset('js/tableEdit.js') }}"></script>	<!-- tabla editable-->
	<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/function.js') }}"></script> 	<!-- mi ajax -->
	@endsection
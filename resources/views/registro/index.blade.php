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

@section('breadcrumbs')
{{ breadcrumbs('personaimportar') }}		
@endsection



	@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-users"></i> IMPORTAR PERSONAS</h3>

	<div class="row">
<div class="col-md-12">
	<br>	<br>
	

				<p>
					1. Ingrese el fichero Excel que se procesara <br><br>

					2. Es necesario que sea un archivo con formato adecuado .xls <br>
				</p>

				
</div>
	<div class="col-md-12">
	<div class="box-body">
					{{ Form::open (['url' => 'import-excel', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) }}
						@include('registro.partials.form')
		            {{ Form::close() }}
				</div>
				@include('registro.partials.info')
			</div>
	
		<div class="row">
			<div class="container">
				<table class="table table-hover">
					<div id="tablecontent"></div>
				</table>
			</div>
			
			</div>
	</div>

	

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
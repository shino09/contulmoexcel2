@extends('layouts.master')

@section('title')
    Personas
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-users"></i>
		PERSONAS
		<small>Gestionar personas en el sistema</small>
	</h1>
@endsection

@section('breadcrumbs')
{{ breadcrumbs('persona') }}		
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-list"></i> LISTA DE PERSONAS</h3>

	 	<div class="box-tools">
				@can('persona.create')
			<a href="{{ route('persona.create') }}" class="btn btn-flat btn-sm btn-success">
				<i class="fa fa-plus-circle"></i> CREAR NUEVA PERSONA
			</a>
			@endcan
			@can('importar-personas-elegirarchivo')
			<a href="{{ route('importar-personas-elegirarchivo') }}" class="btn btn-flat btn-sm btn-success">
				<i class="fa fa-file-excel-o"></i> IMPORTAR EXCEL
			</a>
			@endcan
			@can('exportarpersonas')
			<a href="{{ route('exportar-personas') }}" class="btn btn-flat btn-sm btn-success">
				<i class="fa fa-file-excel-o"></i> EXPORTAR EXCEL
			</a>
			@endcan
		
		</div>
			
	</div>
	<div class="box-body">
		<table id="persona" class="table table-bordered table-striped table-hover">
			<thead>
				<tr>
					<th width="10px">#</th>
					<th>NOMBRE</th>
					<th>APELLIDO</th>
					<th>FECHA</th>


					<th>ACCIONES </th>
				</tr>
			</thead> 
		</table>
  </div>
	<!-- /.box-body -->
</div>

@endsection

@section('scripts')
<script>
  $(function () {
    $('#persona').DataTable({
			responsive: true,
			autoWidth:false,
    	language: {
        url: "{{ asset('plugins/datatables.net/Spanish.json') }}",
        searchPlaceholder: "Buscar Persona..."
      },
			order: [[ 0, "asc" ]],
			processing: true,
			serverSide: true,
			ajax: '{!! route('persona.apiPersona') !!}',
			columns: [
				{ data: 'column_index'},
				{ data: 'nombre'},
				{ data: 'apellido'},
				{ data: 'fecha'},


				{ data: 'action', orderable: false, searchable: false},
			],
		});
	})

	const eliminarPersona = id =>{
				let ruta = window.location+`/${id}/delete`

		eliminar(ruta,'persona')
	}
</script>
@endsection
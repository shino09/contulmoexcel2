@extends('layouts.master')

@section('title')
    Personas
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-users"></i>
		PERSONAS
		<small>Actualizacion de datos de la persona</small>
	</h1>
@endsection

@section('breadcrumbs')
{{ breadcrumbs('personaedit') }}		
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-user"></i> Actualizar datos de la persona</h3>
	</div>
	<div class="box-body">
		{!! Form::model($persona, ['route' => ['persona.update', $persona->id], 'method' => 'PUT','enctype' => "multipart/form-data"]) !!}
			@include('persona.partials.formupdate')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection
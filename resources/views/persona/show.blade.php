@extends('layouts.master')

@section('title')
    Personas
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-users"></i>
		Personas
		<small>Mostrando los datos de la Persona</small>
	</h1>
@endsection

@section('breadcrumbs')
{{ breadcrumbs('personashow') }}		
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-user"></i> Mostrar los datos de la persona</h3>
	</div>
	<div class="box-body">
		{!! Form::model($persona, ['route' => ['persona.show', $persona->id], 'method' => 'GET']) !!}
			@include('persona.partials.formshow')
		{!! Form::close() !!}
    </div>
	<!-- /.box-body -->
</div>

@endsection
@extends('layouts.master')

@section('title')
    Usuarios
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-users"></i>
		PERSONA
		<small>Nuevo registro</small>
	</h1>
@endsection

@section('breadcrumbs')
{{ breadcrumbs('personacreate') }}		
@endsection

@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-user-plus"></i> Registrar nueva persona</h3>
	</div>
	<div class="box-body">
		{!! Form::open(['route' => 'persona.store','enctype' => "multipart/form-data"]) !!}
			@include('persona.partials.form')
		{!! Form::close() !!}
    </div>

   
</div>

@endsection
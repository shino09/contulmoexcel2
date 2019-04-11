@extends('layouts.veerdoc')

@section('title')
    Veer PDF
@endsection



@section('breadcrumbs')
{{ breadcrumbs('personashow') }}		
@endsection


@section('main-content')
<div class="box">
	<div class="box-header with-border">
	 	<h3 class="box-title"><i class="fa fa-file-word-o"></i> Nombre archivo: <?php print_r($nombre); ?> 
</h3>
	</div>
	<div class="box-body">
<?php print_r($contenido); ?> 
    </div>
	<!-- /.box-body -->
</div>

@endsection
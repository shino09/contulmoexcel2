@canatleast(['persona.show','persona.edit','persona.destroy'])
<div>


			<?php if($file!=NULL){ ?>
         <a href="{{$ruta}}"title="Veer PDF" target="_blank" class="btn btn-success btn-circle" >     <i class="fa fa-file-pdf-o"></i></a>

         	 <a href="persona/veerpdf/{{$id}}"  title="Veer PDF" target="_blank" class="btn btn-success btn-circle" >     <i class="fa fa-file-pdf-o"></i></a>

                  <a href="persona/descargarpdf/{{$id}}" title="Descargar PDF" target="_blank" class="btn btn-success btn-circle" >     <i class="fa fa-download"></i> 
</a>
       			<?php } ?>

			<?php if($file==NULL){ ?>

  <a href="persona/veerpdf/{{$id}}" title="Veer PDF"  class="btn btn-success btn-circle" >     <i class="fa fa-file-pdf-o"></i> </a>

         <a href="persona/descargarpdf/{{$id}}" title="Descargar PDF" class="btn btn-success btn-circle" >     <i class="fa fa-download"></i>
</a>
       			<?php } ?>

     

		@can('persona.show')
		<a  class="btn btn-warning btn-circle" title="Ver" href="{{ route('persona.show',$id) }}"><i class="fa fa-eye"></i> </a>
		@endcan


		@can('persona.edit')
		<a  class="btn btn-primary btn-circle" title="Editar" href="{{ route('persona.edit',$id) }}"><i class="fa fa-pencil"></i> </a>
		@endcan



    


	
	
		@can('persona.destroy')
		<a class="btn btn-danger btn-circle" title="Eliminar" href="javascript:void(0);" onclick="eliminarPersona({{ $id }}); return false;"><i class="fa fa-trash"></i></a>
		@endcan
</div>
@endcanatleast

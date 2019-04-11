<?php

namespace SIS\Http\Controllers;

use Illuminate\Http\Request;
use SIS\Http\Requests\PersonaStoreRequest;
use SIS\Http\Requests\PersonaUpdateRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Response;
use File;



use SIS\Persona;
use Toastr;
use Caffeinated\Shinobi\Models\Role;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class PersonaController extends Controller
{
  public function __construct(){
		$this->middleware('auth');
	}

	public function apiPersona()
	{
		$persona = Persona::orderBy('nombre','ASC')->get();
		return Datatables::of($persona)
										->addIndexColumn()
								
										->addColumn('action','persona.partials.acciones')
										->rawColumns(['action'])
										->toJson();
	}

	public function index()
	{
		return view('persona.index');
	}

	public function create()
	{
		$roles = Role::orderBy('name','ASC')->pluck('slug','id');
		return view('persona.create', compact('roles'));
	}

	public function store(PersonaStoreRequest $request)
	{

		//print_r($request);die();

		$file = $request->file('file');
		$file_name = time() . $file->getClientOriginalName();                      
		$file_path = 'uploads';
		$file->move($file_path, $file_name);
		$ruta=$file_path.'/'.$file_name;
		chmod($ruta, 0777); 

		$persona = Persona::create($request->all());
		    
		if($request->roles!=[])
		{
			$persona->syncRoles($request->roles);
		}

		$idfinal=$persona->id;

   		$personafile= DB::table('personas')
            ->where('id', $idfinal)
            ->update(['file' => $file_name]);

        $personaruta= DB::table('personas')
            ->where('id', $idfinal)
            ->update(['ruta' => $ruta]);

		Toastr::success('Persona creada con exito','Correcto!');
		return redirect()->route('persona.index');
	}



	

	public function edit(Persona $persona)
	{
		$ruta=$persona->ruta;
		return view('persona.edit',compact('persona','ruta'));
	}



	public function update(PersonaUpdateRequest $request, Persona $persona)
	{



		$id=$persona->id;
		$persona = persona::find($id);



        if(Input::hasFile('file'))
        {
        	$fileviejo=$persona->ruta;
		    File::delete($fileviejo);
            $file = Input::file('file');
            //$file = time() . $file->getClientOriginalName();                      
            //print_r($file);
			//die();
            $file->move(public_path().'/uploads',time().$file->getClientOriginalName());
            $persona->file = time().$file->getClientOriginalName();

            $ruta = 'uploads/'.$persona->file;
            //echo $ruta;
            //die();
			//$file->move($file_path, $file_name);
			//$ruta=$file_path.'/'.$file_name;
			chmod($ruta, 0777); 

        $personaruta= DB::table('personas')
            ->where('id', $id)
            ->update(['ruta' => $ruta]);

        }

        $persona->apellido=$request->input("apellido");
        $persona->nombre=$request->input("nombre");
        $persona->telefono=$request->input("telefono");
        $persona->fecha=$request->input("fecha");

        $persona->update();

		/*$persona->fill($request->all());
		if($request->password){
			$persona->fill([
				'password'=>$request->password
			])->save();
		}
		$persona->save();*/

		Toastr::info('Persona actualizada con exito','Actualizado!');
		return redirect()->route('persona.index');
	}

public function getDocument($id)
{
    $document = persona::findOrFail($id);
	$filePath = $document->file;
	$filePath='uploads/'.$filePath;

	 if(!File::exists($filePath)) {
     	 abort(404);
    	}

    $pdfContent = File::get($filePath);
    $type = File::mimeType($filePath);
    //print_r($type) ;die();
	$fileName=$filePath;
	//print_r($type);die();


    if($type=='application/pdf'){


	return Response::make($pdfContent, 200, [
      'Content-Type'        => $type,
      'Content-Disposition' => 'inline; filename="'.$fileName.'"'
    ]);
	}
    if($type=='application/vnd.openxmlformats-officedocument.wordprocessingml.document' || $type='application/msword'){
$file = $filePath;
//$phpWord = \PhpOffice\PhpWord\IOFactory::load($file);
//print_r($file);die('es docx o doc');

//print_r($phpWord);die();
//print_r($type);die();
//$phpWord->save('b.docx');

$phpWord = \PhpOffice\PhpWord\IOFactory::load($file);
//echo '1323';die('sdas');
$htmlWriter = new \PhpOffice\PhpWord\Writer\HTML($phpWord);
$htmlWriter->save('temporal.html');
//print_r($htmlWriter);die();
$wordcontent = File::get('temporal.html');
print_r($wordcontent);

/*return Response::make($wordcontent, 200, [
      'Content-Type'        => $type,
      'Content-Disposition' => 'inline; filename="'.$fileName.'"'
    ]);*/
}
}

	public function destroy(Persona $persona)
	{
		//echo 'llego al controlador';
		//die();
		$id=$persona->id;
		$persona = persona::find($id);
			$fileviejo=$persona->ruta;
			//print_r($fileviejo);
			//die('ooo');
		    File::delete($fileviejo);
		$persona->delete();
		Toastr::error('Persona eliminada correctamente','Eliminado!');
		return response()->json();
	}

	public function show(Persona $persona)
	{
		return view('persona.show',compact('persona'));
	}

 public function descargarpdf($id)
    {


              $persona = persona::where('id', '=', $id)->first();
                $personafile=$persona->file;
//$rutaDeArchivo = storage_path() + "ruta_del_archivo_dentro_de_laravel_storage";

                if($personafile!=NULL){

                $rutaDeArchivo='uploads/'.$personafile;
return response()->download($rutaDeArchivo);
}
else{
Toastr::error('No posee archivo pdf','Error!');
return back();
}
}


 public function veerpdf($id)
    {


              $persona = persona::where('id', '=', $id)->first();
                $personafile=$persona->file;
//$rutaDeArchivo = storage_path() + "ruta_del_archivo_dentro_de_laravel_storage";

                                if($personafile!=NULL){

                                	//esto no funciona, se hace con un blank en el boton por ahora

               // $rutaDeArchivo='uploads/'.$personafile;
               //echo "<script>window.open('".$rutaDeArchivo."', '_blank')</script>";
                              

                               $rutaDeArchivo='/uploads/'.$personafile;
			echo "<script>window.open('".$rutaDeArchivo."','_blank');</script>";


//return response()->download($rutaDeArchivo);

}

else{
	//esto si se usa
Toastr::error('No posee archivo pdf','Error!');
return back();
}



}
}




/*
	public function edit($id)
    {
        $persona = persona::find($id);
   
        return view('persona.edit')->with('persona',$persona);
    }


    public function update(Request $request, $id)
    {
        $persona = persona::find($id);
        if(Input::hasFile('file'))
        {
            $file = Input::file('file');
            $file->move(public_path().'/uploads/',$file->getClientOriginalName());
            $persona->file = $file->getClientOriginalName();
        }

        $persona->nombre = $request->input("nombre");
        $persona->apellido = $request->input("apellido");
        $persona->telefono = $request->input("telefono");
        
        $persona->update();

        return redirect('/persona')->with('mensaje','Equipo actualizado exitósamente');
    }*/
/*
	    public function update($id)
    {
        $persona = persona::find($id);
        

         $rules = ["nombre" => "required","apellido" => "required","telefono" => "required","file" => "mimes:pdf|unique:personas,file,".$id, ];
      
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return array(
                'fail' => true,
                'errors' => $validator->getMessageBag()->toArray()
            );
        }
                        $persona->file = Input::get('file');

        $persona->nombre = Input::get('nombre');
        $persona->apellido = Input::get('apellido');
                $persona->telefono = Input::get('telefono');
       
        $persona->save();
        return ['url' => 'alumno/list'];
    }*/

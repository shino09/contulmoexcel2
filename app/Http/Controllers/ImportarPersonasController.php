<?php
namespace SIS\Http\Controllers;
use Illuminate\Http\Request;
use SIS\Persona;
use \Excel;
use Validator;
use JavaScript;
use SIS\Http\Requests\ExcelRequest;
use PHPExcel;
use SIS\Http\Requests\ImportarPersonaRequest;
use File;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use DB;
use Toastr;



//use Maatwebsite\Excel\Facades\Excel;
class ImportarPersonasController extends Controller
{
    protected $request;
    protected $persona;
    protected $data = [];
    protected $i = 1;
    protected $errors;
    protected $input;
    protected $rules;

    public function __construct(Request $request, Persona $persona)
    //    public function __construct(ImportarPersonaRequest $request, Persona $persona)

    {
        $this->request = $request;
        $this->persona = $persona;
        $this->errors = [];
        $this->data = [];
        $this->rules = [
            'telefono'       => 'required|numeric|max:99999999',
            'nombre'  => 'required|regex:/^[A-z][A-z\s\.\']+$/|max:100',
            'apellido'     => 'required|regex:/^[A-z][A-z\s\.\']+$/|max:100',
            'fecha'         => 'required|date',
        ];
    }

    public function index()
    {
        return view('importarpersonas.formarchivo');
    }

    public function tabla()
    {
        return view('importarpersonas.tabla');
    }

    //public function importFile(Request $request, Persona $persona)
        public function importFile(ImportarPersonaRequest $request, Persona $persona)

    {
               

        if($request->hasFile('file'))
{
   $extension = File::extension($request->file->getClientOriginalName());
   if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                    $file = $request->file('file');

                        $this->processData($file);
                         return view('importarpersonas.tabladatos', [ 'data' => $this->data, 'errors' => $this->errors, 'input' => $this->input]);
   }else {
            Toastr::error('Tipo de archivo no valido, porfavor intente otravez','Error de archivo!');

    return back();
 
}

    }
    else{
    $this->processData($file);
                         return view('importarpersonas.tabladatos', [ 'data' => $this->data, 'errors' => $this->errors, 'input' => $this->input]);
    }

}
    protected function validateCell(array $data, array $rules)
    {
        // Perform Validation
        $validator = \Validator::make($data, $rules);

        if ($validator->fails()) {
            $errorMessages = $validator->errors()->messages();

            // crete error message by using key and value
            foreach ($errorMessages as $key => $value) {
                $errorMessages = $value[0];
            }

            return $errorMessages;
        }

        return [];
    }

    public function store(Request $request)
    {
        $this->validateData($request);

        if (!empty($this->errors)) {
            return view('importarpersonas.tabladatos', [
                'data' => $this->data,
                'errors' => $this->errors,
                'input' => $this->input
            ]);
        }

        foreach ($this->data as $data) {

            $data = array_except($data, ['id']);

            $persona = new Persona;
            $persona->nombre = $data['nombre'];
            $persona->apellido = $data['apellido'];
            $persona->telefono = $data['telefono'];
            $persona->fecha = $data['fecha'];

            $persona->save();
        }
                Toastr::success('Personas importadas  con exito','Importacion exitosa!');


        return redirect()->route('persona.index')->with('info', 'Datos Guardados');
    }

    protected function processData($request)
    {

        //print_r($request);die();
       // Excel::selectSheetsByIndex(0)->load($request->excel, function($reader) {
                    // Excel::load($request->file($request->excel), function ($reader) {


//die('jola');

    //Excel::import($request->excel, function($reader) {
                //Excel::import(request()->file($request->excel),function($reader){
                       


                       // Excel::import(new ExcelRequest,request()->file($request->excel),function($reader){

        Excel::selectSheetsByIndex(0)->load($request, function($reader) {



            
            //$reader->formatDates(true, 'd-m-Y');
                        $reader->formatDates(true, 'Y-m-d');


            $excel = $reader->get();

            $this->errors = [];
            $this->rowNumber = 0;

            $excel->each(function($row) {
               // print_r($row->fecha);

                $this->data[$this->rowNumber] = [
                    'nombre'       => $row->nombre,
                    'apellido'  => $row->apellido,
                    'telefono'      => $row->telefono,
                    'fecha'         => $row->fecha,
                ];

                foreach ($this->data[$this->rowNumber] as $key => $value) {

                    $error = $this->validateCell([$key => $value], [$key => $this->rules[$key]]);

                    if (!empty($error)) {
                        $this->errors[$this->rowNumber][$key] = $error;
                    }
                    
                }

                $this->data[$this->rowNumber]['id'] = $this->rowNumber;

                //echo($this->rowNumber);

                $this->rowNumber++;
            });
                    //print_r($this->data);die();

        });

    }

    protected function validateData($request)
    {
        $data = $request->except('_token');

        $this->errors = [];
        $this->rowNumber = 0;

        foreach ($data as $dataKey => $value) {

            $i = 0;

            foreach ($value as $item) {

                $error = $this->validateCell([$dataKey => $item], [$dataKey => $this->rules[$dataKey]]);

                if (!empty($error)) {
                    $this->errors[$i][$dataKey] = $error;
                }

                $this->data[$i]['id'] = $i;

                $this->data[$i][$dataKey] = $item;

                $i++;
            }
        }
    }


public function testexcel(){

    Excel::create('testfile', function($excel) {
        // Set the title
        $excel->setTitle('no title');
        $excel->setCreator('no no creator')->setCompany('no company');
        $excel->setDescription('report file');

        $excel->sheet('sheet1', function($sheet) {
            $data = array(
                array('header1', 'header2','header3','header4','header5','header6','header7'),
                array('data1', 'data2', 300, 400, 500, 0, 100),
                array('data1', 'data2', 300, 400, 500, 0, 100),
                array('data1', 'data2', 300, 400, 500, 0, 100),
                array('data1', 'data2', 300, 400, 500, 0, 100),
                array('data1', 'data2', 300, 400, 500, 0, 100),
                array('data1', 'data2', 300, 400, 500, 0, 100)
            );
            $sheet->fromArray($data, null, 'A1', false, false);
            $sheet->cells('A1:G1', function($cells) {
            $cells->setBackground('#AAAAFF');

            });
        });
    })->download('xlsx');
}


public function exportarpersonas(){
 Excel::create('Excel personas', function($excel) {
        // Set the title
        $excel->setTitle('no title');
        $excel->setCreator('no no creator')->setCompany('no company');
        $excel->setDescription('report file');

        $excel->sheet('Personas', function($sheet) {
           

                $personas = Persona::all();

            $sheet->row(1, ['Nombre', 'Apellido', 'Telefono', 'Fecha']);

            foreach($personas as $index => $persona) {
             $sheet->row($index+2, [$persona->nombre, $persona->apellido, $persona->telefono, $persona->fecha ]); 
            }
            $sheet->cells('A1:D1', function($cells) {
            $cells->setBackground('#AAAAFF');

            });
        });
    })->download('xlsx');
}
}


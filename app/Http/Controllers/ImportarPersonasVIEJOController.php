<?php
namespace SIS\Http\Controllers;
use Illuminate\Http\Request;
use SIS\Persona;
use \Excel;
use Validator;
use JavaScript;
use SIS\Http\Requests\ExcelRequest;
use PHPExcel;
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

    public function importFile(Request $request, Persona $persona)
    {
        //die('importfile controlador');
                //print_r($request->excel);die('sdfsdf');

        $this->processData($request);

        return view('importarpersonas.tabladatos', [ 'data' => $this->data, 'errors' => $this->errors, 'input' => $this->input]);
    }

    /**
     * Validate cell against the rules.
     *
     * @param array $data
     * @param array $rules
     *
     * @return array
     */
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

        return redirect()->route('home')->with('info', 'Datos Guardados');
    }

    protected function processData($request)
    {

        //print_r($request->excel);die();
       // Excel::selectSheetsByIndex(0)->load($request->excel, function($reader) {
                    // Excel::load($request->file($request->excel), function ($reader) {


//die('jola');

    //Excel::import($request->excel, function($reader) {
                //Excel::import(request()->file($request->excel),function($reader){
                       


                       // Excel::import(new ExcelRequest,request()->file($request->excel),function($reader){

        Excel::selectSheetsByIndex(0)->load($request->excel, function($reader) {



            
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
}
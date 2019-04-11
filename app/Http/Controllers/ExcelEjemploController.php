<?php
   
namespace SIS\Http\Controllers;
  
use Illuminate\Http\Request;
use SIS\Exports\UsersExport;
use SIS\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
  
class ExcelEjemploController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
           
        return back();
    }
}
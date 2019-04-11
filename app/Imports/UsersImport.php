<?php
  
namespace SIS\Imports;
  
use SIS\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

  
class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'nombre'     => $row[0],
            'nickname'    => $row[1], 
            //'password' => \Hash::make('123456'),
            'password' => Hash::make($row[2]),
        ]);
    }
}
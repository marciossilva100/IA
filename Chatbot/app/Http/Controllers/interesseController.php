<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class interesseController extends Controller
{
    public function getInteresse(){
        $select = DB::table('interesses')->select('id_interesse','interesse')->orderBy('interesse','ASC')->get(); 
        return $select;
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function getCityData(){
        //$results = DB::select('select * from tbl_city');

        $results = DB::table('tbl_city')->get();
        $data['draw'] = 1;
        $results['recordsTotal'] = DB::table('tbl_city')->count();
        $results['recordsFiltered'] = DB::table('tbl_city')->count();
        return json_encode($results);
    }

    public function getAreaData(){
        
        $results = DB::table('tbl_city')->get();
        $results['recordsTotal'] = DB::table('tbl_city')->count();
        $results['recordsFiltered'] = DB::table('tbl_city')->count();
        return json_encode($results);
    }

    
}

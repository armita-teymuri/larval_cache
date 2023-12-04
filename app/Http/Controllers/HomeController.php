<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // $cities = City::orderBy('ID')->get();
        // var_dump($cities) ;


        // $cities =  DB::table('cities')->get();
        // var_dump($cities) ;

        DB::table('cities')->orderBy('ID')->chunk(100,function($cities){
            foreach($cities as $city)
            {
                var_dump($city) ;
            }
        });
        



        return view('welcome');
    }
}

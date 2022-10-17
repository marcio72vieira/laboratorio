<?php

namespace App\Http\Controllers\Catadores;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Associado;
use DB;
use Carbon\Carbon;


class ChartJsController extends Controller
{
    // Ref: https://www.nicesnippets.com/blog/laravel-8-charts-js-chart-example-tutorial
    public function index()

    {
        /*
        $year = ['2015','2016','2017','2018','2019','2020'];
        $user = [];
        foreach ($year as $key => $value) {
            $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
        }
    	return view('catadores.charts.chartjs')->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
        */


        //$etinia = ["amarela","branca","indigena","parda","preta"];
        $etinia = array('amarela','branca','indigena','parda','preta');
        //$etinia = array("1","2","3","4","5");
        
        $associado = [];
        foreach ($etinia as $key => $value) {
            //$associado[] = Associado::where(\DB::raw("DATE_FORMAT(created_at, '%Y')"),$value)->count();
            $associado[] = Associado::where("racacor", "=", $value)->count();
            
        }

        
        //return view('catadores.charts.chartjs')->with('etinia',json_encode($etinia))->with('associado',json_encode($associado,JSON_NUMERIC_CHECK));
        return view('catadores.charts.chartjs')->with('etinia',json_encode($etinia, JSON_NUMERIC_CHECK))->with('associado',json_encode($associado,JSON_NUMERIC_CHECK));
        
        //**return view('chartjs')->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));

    }

}

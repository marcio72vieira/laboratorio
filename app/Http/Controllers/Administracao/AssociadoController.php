<?php

namespace App\Http\Controllers\Administracao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Associado;

class AssociadoController extends Controller
{
    public function index(){
        //return view('employees.index');
        return view('pages.associados');
    }

    /*
    AJAX request
    */
    public function getAssociados(Request $request){

        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Associado::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Associado::select('count(*) as allcount')->where('nome', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = Associado::orderBy($columnName,$columnSortOrder)
        ->where('associados.nome', 'like', '%' .$searchValue . '%')
        ->select('associados.*')
        ->skip($start)
        ->take($rowperpage)
        ->get();

        $data_arr = array();

        foreach($records as $record){
            $id = $record->id;
            $nome = $record->nome;
            $cpf = $record->cpf;
            $sexo = $record->sexo;
            $racacor = $record->racacor;

            $data_arr[] = array(
                "id" => $id,
                "nome" => $nome,
                "cpf" => $cpf,
                "sexo" => $sexo,
                "racacor" => $racacor
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }
}

<?php

namespace App\Http\Controllers\Catadores;

use App\Http\Controllers\Controller;
use App\Http\Requests\Catadores\MunicipioCreateRequest;
use App\Http\Requests\Catadores\MunicipioUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Municipio;
use App\Exports\MunicipioExport;
use Excel;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Validator;   //Validação unique
use Illuminate\Validation\Rule;             //Validação unique

class MunicipioController extends Controller
{

    public function index()
    {
        //$municipios = Municipio::all(); //return view('catadores.municipio.index', compact('municipios'));
        return view('catadores.municipio.index');
    }

    /* AJAX request */
    public function getMunicipios(Request $request){

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
        $totalRecords = Municipio::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Municipio::select('count(*) as allcount')->where('nome', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = Municipio::orderBy($columnName,$columnSortOrder)
        ->where('municipios.nome', 'like', '%' .$searchValue . '%')
        ->select('municipios.*')
        ->skip($start)
        ->take($rowperpage)
        ->get();

        $data_arr = array();

        foreach($records as $record){
            // campos a serem exibidos
            $id = $record->id;
            $nome = $record->nome;

            // ações
            $actionShow = "<a href='".route('admincat.municipio.show', $id)."' title='exibir'><i class='fas fa-eye text-warning mr-2'></i></a>";
            $actionEdit = "<a href='".route('admincat.municipio.edit', $id)."' title='editar'><i class='fas fa-edit text-info mr-2'></i></a>";
            $actionDelete = "<a href='' class='deletemunicipio' data-idmunicipio='".$id."' data-nomemunicipio='".$nome."'  data-toggle='modal' data-target='#formDelete' title='excluir'><i class='fas fa-trash text-danger mr-2'></i></a>";
            $actions = $actionShow. " ".$actionEdit. " ".$actionDelete;

            $data_arr[] = array(
                "id" => $id,
                "nome" => $nome,
                "actions" => $actions,
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



    public function create()
    {
        return view('catadores.municipio.create');
    }


    public function store(MunicipioCreateRequest $request)
    {
        Municipio::create($request->all());

        $request->session()->flash('sucesso', 'Registro incluído com sucesso!');

        return redirect()->route('admincat.municipio.index');
    }


    public function show($id)
    {
        $municipio = Municipio::find($id);

        return view('catadores.municipio.show', compact('municipio'));
    }


    public function edit($id)
    {
        $municipio = Municipio::find($id);

        return view('catadores.municipio.edit', compact('municipio'));
    }


    public function update($id, MunicipioUpdateRequest $request)
    {
        $municipio = Municipio::find($id);

        // Validação unique
        Validator::make($request->all(), [
            'nome' => [
                'required',
                Rule::unique('municipios')->ignore($municipio->id),
            ],
        ]);


        $municipio->update($request->all());

        $request->session()->flash('sucesso', 'Registro atualizado com sucesso!');

        return redirect()->route('admincat.municipio.index');
    }


    public function destroy($id, Request $request)
    {

        Municipio::destroy($id);

        $request->session()->flash('sucesso', 'Registro excluído com sucesso!');

        return redirect()->route('admincat.municipio.index');

    }


    // Configuração de Relatórios PDFs
    public function relatoriomunicipio()
    {
        $municipios = Municipio::all();

        $fileName = ('Municipios_lista.pdf');

        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 32,
            'margin_bottom' => 15,
            'margin-header' => 10,
            'margin_footer' => 5
        ]);

        $mpdf->SetHTMLHeader('
            <table style="width:717px; border-bottom: 1px solid #000000; margin-bottom: 3px;">
                <tr>
                    <td style="width: 83px">
                        <img src="images/logo-ma.png" width="80"/>
                    </td>
                    <td style="width: 282px; font-size: 10px; font-family: Arial, Helvetica, sans-serif;">
                        Governo do Estado do Maranhão<br>
                        Secretaria de Governo<br>
                        Secreatia Adjunta de Tecnologia da Informação/SEATI<br>
                        Secretaria do Trabalho e Economia Solidaria/SETRES
                    </td>
                    <td style="width: 352px;" class="titulo-rel">
                        MUNICÍPIOS
                    </td>
                </tr>
            </table>
            <table style="width:717px; border-collapse: collapse;">
                <tr>
                    <td width="50px" class="col-header-table">ID</td>
                    <td width="667px" class="col-header-table">NOME</td>
                </tr>
            </table>
        ');

        $mpdf->SetHTMLFooter('
            <table style="width:717px; border-top: 1px solid #000000; font-size: 10px; font-family: Arial, Helvetica, sans-serif;">
                <tr>
                    <td width="239px">São Luis(MA) {DATE d/m/Y}</td>
                    <td width="239px" align="center"></td>
                    <td width="239px" align="right">{PAGENO}/{nbpg}</td>
                </tr>
            </table>
        ');


        $html = \View::make('admin.municipio.pdf.pdfmunicipiogeral', compact('municipios'));
        $html = $html->render();

        $stylesheet = file_get_contents('pdf/mpdf.css');
        $mpdf->WriteHTML($stylesheet, 1);

        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');

        //return view('admin.residuo.pdf.pdfresiduogeral', compact('residuos'));
    }

    // Relatório Excel
    public function relatoriomunicipioexcel()
    {
        if(Gate::authorize('adm')){
            return Excel::download(new MunicipioExport,'municipios.xlsx');
        }

    }


    // Relatório CSV
    public function relatoriomunicipiocsv()
    {
        if(Gate::authorize('adm')){
            return Excel::download(new MunicipioExport,'municipios.csv');
        }

    }
}

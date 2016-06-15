<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Validator;

class ChequeNuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try{
          $data = DB::table('providers')
                        ->select('*')
                        ->where('comment','=','NULO')
                        ->where('prov_doc_detalle','=','NULO')
                        ->where('payment_type','=','CHEQUE')
                        ->get();

          return response()->json(['result_code'=>'201', 'result_content'=>$data]);
        }catch(Exception $ex){
          return response()->json(['result_code'=>'400', 'result_content'=>$ex->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->ajax()){
          $validation = Validator::make($request->all(), [
            'check_number'       =>  'required|numeric',
            'check_bank'         =>  'required|alpha_dash',
          ]);

          if($validation->fails()){
            $txt='<ul>Existen algunos errores de validación que debe solucionar:';
            foreach($validation->errors()->all() as $err){ $txt.='<li>'.$err.'</li>'; }
            $txt.='</ul>';
            return response()->json(['result_code'=>'400', 'result_content'=>$txt]);
          }else{
            $nulo = DB::select('select number from providers where number<0 order by number ASC LIMIT 1');
            $value=0;
            foreach($nulo as $l){ $value=$l->number; }
            $value--;

            $data = [
              'prov_name'       =>  'NULO',
              'prov_doc_type'   =>  'NULO',
              'prov_doc_date'   =>  '-',
              'prov_doc_number' =>  '-',
              'prov_doc_value'  =>  '0',
              'prov_doc_detalle'=>  'NULO',
              'check_number'    =>  $request->check_number,
              'check_value'     =>  '0',
              'check_bank'      =>  $request->check_bank,
              'check_date'      =>  '',
              'number'          =>  $value,
              'payment_type'    =>  'CHEQUE',
              'comment'         =>  'NULO',
            ];

            try{
              $cheque = DB::table('providers')
                                ->where('check_number','=',$request->check_number)
                                ->get();

              if($cheque==NULL){
                DB::table('providers')->insert($data);
                return response()->json([
                  'result_code'       =>  '201',
                  'result_content'    =>  'Se ha agregado exitosamente el registro']);
              }else {
                return response()->json([
                  'result_code'       =>  '400',
                  'result_content'    =>  'El registro ya existe']);
              }
            }catch(Exception $ex){
              return response()->json(['result_code'=>'400', 'result_content'=>$ex->getMessage()]);
            }
          }
        }else{
          return response()->json(['result_code'=>'401', 'result_content'=>'No se ha podido procesar la solicitud porque no ha sido autorizada']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if($id!=NULL){
          if(is_numeric($id)){
            DB::table('providers')->where('id','=',$id)->delete();
            return response()->json(['result_code'=>'201', 'result_content'=>'registro eliminado']);
          }
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          $data = DB::select('select number from providers order by number DESC LIMIT 1;');
          $value=0;
          foreach($data as $l){ $value=$l->number; }
          $value++;

          $data = DB::select('select * from providers order by number DESC, check_date DESC;');
          return view('proveedores.proveedores', ['last_number'=>$value, 'data'=>$data]);
    }

    public function ObtenerTodos(){
      try{
        $data = DB::select('select * from providers order by number DESC, check_date DESC;');
        return response()->json(['result_code'=>'201', 'result_content'=>$data]);
      }catch(Exception $e){
        return response()->json(['result_code'=>'400', 'result_content'=>$e->getMessage()]);
      }
    }

    /**comment
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
            'prov_name'       =>  'required|max:90',
            'prov_doc_type'   =>  'required|alpha',
            'prov_doc_date'   =>  'required',
            'prov_doc_number' =>  'required|integer|min:1',
            'prov_doc_value'  =>  'required|integer|min:50',
            'prov_doc_detalle'=>  'required',
            'check_number'    =>  'required',
            'check_value'     =>  'required|integer|min:50',
            'check_bank'      =>  'required|min:5|max:90|alpha_num',
            'check_date'      =>  'required',
            'number'          =>  'required',
            'payment_type'    =>  'required',
          ]);
          if($validation->fails()){
            $txt='<ul>Existen algunos errores de validación que debe solucionar:';
            foreach($validation->errors()->all() as $err){ $txt.='<li>'.$err.'</li>'; }
            $txt.='</ul>';
            return response()->json(['result_code'=>'400', 'result_content'=>$txt]);
          }

          $result = DB::select('select prov_doc_number from providers where prov_doc_number=?', [$request->prov_doc_number]);
          foreach ($result as $r) {
            return response()->json(['result_code'=>'400', 'result_content'=>'El número de documento ya existe']);
          }

          try{
            DB::table('providers')->insert($request->all());

            $data = DB::select('select number from providers order by number DESC LIMIT 1');
            foreach($data as $l){ $value=$l->number; }
            $value++;

            return response()->json([
              'result_code'       =>  '201',
              'result_content'       =>  'Se ha agregado exitosamente el registro',
              'result_lastindex'  =>  $value]);

          }catch(Exception $e){
            return response()->json(['result_code'=>'400', 'result_content'=>$e->getMessage()]);
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
      try{
        $data = DB::select('select * from providers where id='.$id);
        return response()->json(['result_code'=>'201', 'result_content'=>$data]);
      }catch(Exception $e){
        return response()->json(['result_code'=>'400', 'result_content'=>$e->getMessage()]);
      }
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
      try{
        DB::table('providers')->where('id', $id)->update($request->all());
        return response()->json(['result_code' => '201', 'result_content' => 'Se ha modificado exitosamente el registro']);
      }catch(Exception $e){
        return response()->json(['result_code'=>'400', 'result_content'=>$e->getMessage()]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        DB::table('providers')->delete($id);
        return response()->json(['result_code'=>'201', 'result_content'=> 'Se ha eliminado exitosamente el registro #'.$id]);
    }
}

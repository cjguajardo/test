<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['web']], function(){
  route::get('registro', function(){
    return view('registro');
  });

/* --------------- PROVEEDORES ------------------- */
  Route::get('/ImprimirComprobante/{id}', function($id){
    $data = DB::table('providers')->where('id', '=', $id)->get();
    return View::make('proveedores.comprobante_egreso', ['data'=>$data]);
  });
  Route::get('/ListadoProveedores/{mes}.{anio}', function($mes, $anio){
    if($mes=='00')
      $data = DB::table('providers')
              ->where('check_date', 'like', $anio.'-%')
              ->orderBy('check_number', 'asc')
              ->orderBy('check_date', 'desc')
              ->get();
    else
      $data = DB::table('providers')
                ->where('check_date', 'like', $anio.'-'.$mes.'-%')
                ->orderBy('check_number', 'asc')
                ->orderBy('check_date', 'desc')
                ->get();

    return View::make('proveedores.listadopormes', ['actual'=>$mes, 'anio'=>$anio, 'data'=>$data]);
  });
  Route::post('/AgregarProveedor',              'ProveedoresController@store');
  Route::post('/ModificarProveedor/{id}',       'ProveedoresController@update');
  Route::get('/ObtenerTodos',                   'ProveedoresController@ObtenerTodos');
  Route::get('/EliminarRegistroProveedor/{id}', 'ProveedoresController@destroy');
  Route::get('/ObtenerRegistroProveedor/{id}',  'ProveedoresController@show');
  Route::get('Proveedores',                     'ProveedoresController@index');

  Route::get('/Citas', function(){
    return View::make('citas.citas');
  });

  //Cheques
  Route::post('/GuardarChequeNulo',   'ChequeNuloController@store');
  Route::post('/ModificarChequeNulo', 'ChequeNuloController@update');
  Route::post('/EliminarNulo/{id}',   'ChequeNuloController@destroy');
  Route::get('/ChequesNulos',         function(){
    $data = '';
    try{
      $data = DB::table('providers')
                    ->select('*')
                    ->where('comment','=','NULO')
                    ->where('prov_doc_detalle','=','NULO')
                    ->where('payment_type','=','CHEQUE')
                    ->get();
    }catch(Exception $ex){
      $data = $ex->getMessage();
    }
    return View::make('proveedores.chequesnulos', ['data'=>$data]);
  });
  Route::get('/ObtenerChequesNulos',  'ChequeNuloController@index');
  //Route::post('RegistrarUsuario', 'RegistroController@RegistrarUsuario');
  //route::get('usuario/{codigo}', function($codigo){ return 'Usuario ' . $codigo; });
});

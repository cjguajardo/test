<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;

class RegistroController extends Controller
{
    public function RegistrarUsuario(Request $request){

      $validator = Validator::make($request->all(), [
          'username'  =>  'required|max:80',
          'password1' =>  'required|max:40',
          'password2' =>  'required|max:40',
      ]);
      if($validator->fails()){
        return redirect('registro')->withInput()->withErrors($validator);
      }
      //var_dump($request->only(['username', 'password1']));

      DB::table('users')->insert([
        'username'  =>$request->username,
        'password'  =>$request->password1,
        'name'      =>$request->username,
        'last_name' =>$request->username,
        'email'     =>$request->username,
      ]);
    }
}

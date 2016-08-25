<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Capture;
use App\Spend;

class CajaChicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'cnumber'     =>  'required',
            'cincharge'   =>  'required',
            'cobjective'  =>  'required',
            'cdate'       =>  'required',
          ]);
          $spends = $request->spend;
          if(count($spends)>0){
            $total=0;
            $capture = new Capture;

            foreach($spends as $s) $total+=$s['samount'];

            $cnumber = $capture->orderBy('cnumber','desc')->first();
            if($cnumber=='') $cnumber = 1;
            else{
              $cnumber = $cnumber->cnumber;
              $cnumber += 1;
            }

            return response()->json(['response'=>$cnumber]);

            $capture->cincharge   = $request->cincharge;
            $capture->cobjective  = $request->cobjective;
            $capture->cdate       = $request->cdate;
            $capture->cnumber     = $cnumber;
            $capture->stotal      = $total;
            $capture->save();

            foreach($spends as $s){
              $spend = new Spend;
              $spend->sdate       = $s['sdate'];
              $spend->stype       = $s['stype'];
              $spend->snumber     = $s['snumber'];
              $spend->sprovider   = $s['sprovider'];
              $spend->sconcept    = $s['sconcept'];
              $spend->samount     = $s['samount'];
              $spend->captureid   = $cnumber;
              $spend->save();
            }
          }
          return response()->json(['Capture'=>$capture->all(), 'Spends'=>Spend::all()]);
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
    }
}

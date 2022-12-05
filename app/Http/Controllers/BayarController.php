<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bayar;

class BayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bayar::all();

        return response()->json([
            "message" => "Load data success",
            "data" => $data
        ], 200);
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
        //$data = Bayar::create([
        //    "nama_pembeli" => $request->nama_pembeli,
        //    "nama_konser" => $request->nama_konser,
        //    "nohp" => $request->nohp,
        //    "email" => $request->email,
        //    "jmlhtkt" => $request->jmlhtkt,
        //    "ttltkt" => $request->ttltkt    
        //]);

        $data = new Bayar();
        $data->nama_pembeli = $request->nama_pembeli;
        $data->nama_konser = $request->nama_konser;
        $data->nohp = $request->nohp;
        $data->email = $request->email;
        $data->jmlhtkt = $request->jmlhtkt;
        $data->ttltkt = $request->ttltkt;
        $data->save();

        // return $data;
        return response()->json([
            "message" => "Store success",
            "data" => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Bayar::find($id);
        if($data){
            return $data;
        }else{
            return ["message" => "Data not found"];
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
        $data = Bayar::find($id);
        if($data){
            $data->nama_pembeli = $request->nama_pembeli ? $request->nama_pembeli : $data->nama_pembeli;
            $data->nama_konser = $request->nama_konser ? $request->nama_konser : $data->nama_konser;
            $data->nohp = $request->nohp ? $request->nohp : $data->nohp;
            $data->email = $request->email ? $request->email : $data->email;
            $data->jmlhtkt = $request->jmlhtkt ? $request->jmlhtkt : $data->jmlhtkt;
            $data->ttltkt = $request->ttltkt ? $request->ttltkt : $data->ttltkt;
            $data->save();

            return $data;
        }else{
            return ["message" => "Data not found"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Bayar::find($id);
        if($data){
            $data->delete();
            return ["message" => "Delete succes"];
        }else{
            return ["message" => "Data not found"];
        } 
    }
}

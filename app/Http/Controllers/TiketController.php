<?php

namespace App\Http\Controllers;
use App\Models\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tiket::all();

        return response()->json([
            "message" => "Konser Yang Tersedia!!!",
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
        $data = Tiket::create([
            "nama_konser" => $request->nama_konser,
            "lokasi_konser" => $request->lokasi_konser,
            "hari_tanggal" => $request->hari_tanggal,
            "waktu" => $request->waktu,
            "harga" => $request->harga,
        ]);
        return response()->json([
            "message" => "Konser Berhasil Di Tambah",
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
        $data = Tiket::find($id);
        if($data){
            return $data;
        }else{
            return ["message" => "Tiket Tidak Ditemukan"];
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
        $data = Tiket::find($id);
        if($data){
            $data->nama_konser = $request->nama_konser ? $request->nama_konser : $data->nama_konser;
            $data->lokasi_konser = $request->lokasi_konser ? $request->lokasi_konser : $data->lokasi_konser;
            $data->hari_tanggal = $request->hari_tanggal ? $request->hari_tanggal : $data->hari_tanggal;
            $data->waktu = $request->waktu ? $request->waktu : $data->waktu;
            $data->harga = $request->harga ? $request->harga: $data->harga;
            $data->save();

            return $data;
        }else{
            return ["message" => "Data  Tidak  Ditemukan"];
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
        $data = Tiket::find($id);
        if($data){
            $data->delete();
            return ["message" => "Data Berhasil Di Hapus"];
        }else{
            return ["message" => "Data Tidak Ditemukan"];
        }
    }
}

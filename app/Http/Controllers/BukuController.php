<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BukuRequest;

use App\Buku;

class BukuController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status'=> 'true', 'data' => Buku::all()], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BukuRequest $request)
    {

        $data = $request->all();
        if (Buku::create($data)) { //save data ke database
            return response()->json(['status'=> 'true', 'message' => 'data berhasil disimpan'], 200);
        }
        
        return response()->json(['status'=> 'false', 'message' => 'data gagal disimpan'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // jika id data yang akan di tampilkan tidak ada di database
        if (! Buku::find($id)) {
            return response()->json(['status'=> 'false', 'message' => 'id data yang anda maksut tidak ditemukan!'], 500);
        }

        return response()->json(['status' => 'true', 'message' => Buku::find($id)]);
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

        $data = $request->except('token');
        // jika id data yang akan di tampilkan tidak ada di database
        if (! Buku::find($id) or empty($id)) {
            return response()->json(['status'=> 'false', 'message' => 'id data yang anda maksut tidak ditemukan!'], 500);
        }

        //update data
        if (Buku::where('id', '=', $id)->update($data)) {
            return response()->json(['status'=> 'true', 'message' => 'data berhasil di update'], 200);
        }
        
        return response()->json(['status'=> 'true', 'message' => 'data gagal di update'], 500);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Buku::find($id) or empty($id)) {
            return response()->json(['status'=> 'false', 'message' => 'id data yang anda maksut tidak ditemukan!'], 500);
        }

        if (Buku::find($id)->delete()) {
            return response()->json(['status'=> 'true', 'message' => 'data berhasil dihapus'], 200);
        }
        
        return response()->json(['status'=> 'false', 'message' => 'data gagal dihapus'], 500);
    }
}

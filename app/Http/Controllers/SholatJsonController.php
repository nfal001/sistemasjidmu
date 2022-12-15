<?php

namespace App\Http\Controllers;

use App\Models\SholatJson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SholatJsonController extends Controller
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

    public function bulanan($kotaID, $year, $month)
    {

        $validation = Validator::make([$kotaID, $year, $month], ['required|numeric|max:3413', 'required|numeric|max:2030', 'required|numeric|max:12']);

        if ($validation->fails()) {
            return response()->json(["status" => "false", "message" => "Inputan Salah atau datanya juga"]);
        }
        $responsed = SholatJson::getBulanan($kotaID, $year, $month);
        return response()->json($responsed);
    }

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

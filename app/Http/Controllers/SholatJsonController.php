<?php

namespace App\Http\Controllers;

use App\Models\SholatJson;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
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

        /*

        * 1. cek json dump di laravel
        ! 1. dumpfileJSON 
        ? 1. call api -> 2. save response body json to dumpStorage in to directory /{kotaID}/{year}/{month}.json -> 3. return response->json($responseJson)
        : 1. return response->json($decodedFile);

        */
        $validation = Validator::make([$kotaID, $year, $month], ['required|numeric', 'required|numeric|max:2030', 'required|numeric|max:12']);

        if ($validation->fails()) {
            return response()->json(["status" => "false", "message" => "Inputan Salah atau datanya juga"]);
        }
        // SholatJson::getBulanan($kotaID, $year, $month);

        if ($month) {
            $month = (int)$month;
            // dd("$month $year");
            $month = sprintf("%02d", $month);
            $year = sprintf("%04d", $year);
        }
        // $year = (int)$year;
        // if ($month < 10) :
        //     $month = "0$month";
        // endif;

        // dd("$kotaID/$year/$month");

        $dumpedFile = Storage::disk('local')->get("json/$kotaID/$year/$month.json");
        $decodedFile = json_decode($dumpedFile, true);
        // dd(json_decode($dumpedFile));

        if (is_null($dumpedFile)) :
            $request = Http::get("https://api.myquran.com/v1/sholat/jadwal/$kotaID/$year/$month");
            $responseJson =  json_decode($request->getBody(), true);

            // dd((string)$request->getBody());

            if (!$responseJson["status"]) {
                return response()->json(["status" => "false", "message" => "Data Tidak Ada"]);
            }

            if (!Storage::disk('local')->exists("json/$kotaID")) {
                Storage::disk('local')->makeDirectory("json/$kotaID");
            } else if (!Storage::disk('local')->exists("json/$kotaID/$year")) {
                Storage::disk('local')->makeDirectory("json/$kotaID/$year");
            }
            Storage::disk('local')->put("json/$kotaID/$year/$month.json", json_encode($responseJson));

            return response()->json($responseJson);
        endif;

        return response()->json($decodedFile);
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

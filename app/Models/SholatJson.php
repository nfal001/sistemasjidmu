<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class SholatJson extends Model
{

    /*
        * 1. cek json dump di laravel
        ! 1. dumpfileJSON 
        ? 1. call api -> 2. save response body json to dumpStorage in to directory /{kotaID}/{year}/{month}.json -> 3. return response->json($responseJson)
        : 1. return response->json($decodedFile);
    */

    use HasFactory;

    static function getBulanan($kotaID, $year, $month)
    {
        if ($month) {
            $month = (int)$month;
            $month = sprintf("%02d", $month);
            $year = sprintf("%04d", $year);
        }

        $dumpedFile = Storage::disk('local')->get("json/$kotaID/$year/$month.json");
        $decodedFile = json_decode($dumpedFile, true);

        if (is_null($dumpedFile)) {
            $request = Http::get("https://api.myquran.com/v1/sholat/jadwal/$kotaID/$year/$month");
            $responseJson =  json_decode($request->getBody(), true);

            if (!$responseJson["status"]) {
                return ["status" => "false", "message" => "Data Tidak Ada"];
            }

            if (!Storage::disk('local')->exists("json/$kotaID")) {
                Storage::disk('local')->makeDirectory("json/$kotaID");
            } else if (!Storage::disk('local')->exists("json/$kotaID/$year")) {
                Storage::disk('local')->makeDirectory("json/$kotaID/$year");
            }

            Storage::disk('local')->put("json/$kotaID/$year/$month.json", json_encode($responseJson));

            return $responseJson;
        }

        return $decodedFile;
    }
    static function getHarian($kotaID, $year)
    {
        dd([$kotaID, $year]);
    }
}

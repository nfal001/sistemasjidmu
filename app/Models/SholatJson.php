<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        dd([$kotaID, $year, $month]);
    }
    static function getTahunan($kotaID, $year)
    {
        dd([$kotaID, $year]);
    }
}

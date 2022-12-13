<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SholatJson extends Model
{
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

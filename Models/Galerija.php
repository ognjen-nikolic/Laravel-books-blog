<?php
/**
 * Created by PhpStorm.
 * User: Miljana
 * Date: 19-Mar-19
 * Time: 00:02
 */

namespace App\Http\Models;


use Illuminate\Support\Facades\DB;

class Galerija
{
    public function insertGalerija($putanja, $alt)
    {
        $rez = \DB::table('galerija')
            ->insert([
                'putanja' => $putanja,
                'alt' => $alt
            ]);
        return $rez;
    }

    public function getOneForInsertRecenzija($putanja)
    {
        $rez = \DB::table('galerija')
            ->where('putanja', '=', $putanja)
            ->first();
        return $rez;
    }

    public function updateSlika($idSlika, $putanja, $alt) {
        \DB::table('galerija')
            ->where('idGalerija', '=', $idSlika)
            ->update([
                'putanja' => $putanja,
                'alt' => $alt
            ]);
    }

    public function deleteSlika($slikaId)
    {
        $rez = \DB::table('galerija')
            ->where('idGalerija','=', $slikaId)
            ->delete();
        return $rez;
    }
}
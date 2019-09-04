<?php
/**
 * Created by PhpStorm.
 * User: Miljana
 * Date: 18-Mar-19
 * Time: 19:58
 */

namespace App\Http\Models;


class Slika
{
    public function delete($id){
        $rez = DB::table('galerija')
            ->where('idGalerija', '=', $id)
            ->delete();

        return $rez;

    }

    public function update($id, $putanja, $alt){

        $rez = DB::table('galerija')
            ->where('idGalerija', '=', $id)
            ->update([
                'putanja'=>$putanja,
                'alt'=>$alt
                ]);

        return $rez;

    }
}
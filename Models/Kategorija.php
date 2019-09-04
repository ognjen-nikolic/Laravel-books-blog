<?php
/**
 * Created by PhpStorm.
 * User: Miljana
 * Date: 18-Mar-19
 * Time: 22:12
 */

namespace App\Http\Models;


use Illuminate\Support\Facades\DB;

class Kategorija
{
    public function getAll()
    {
        $rez = \DB::table('kategorija')
            ->get();

        return $rez;
    }

    public function getById($id)
    {
        $rez = \DB::table('kategorija')
            ->where('idKategorija', '=', $id)
            ->first();
        return $rez;
    }

    public function insertKategorija($kategorija)
    {
        $rez = \DB::table('kategorija')
            ->insert([
                'kategorija' => $kategorija
            ]);
        return $rez;
    }

    public function updateKategorija($idKategorija, $kategorija)
    {
        $rez = \DB::table('kategorija')
            ->where('idKategorija', '=', $idKategorija)
            ->update([
                'kategorija' => $kategorija
            ]);
        return $rez;
    }

    public function deleteKategorija($id){

        $rez = \DB::table('kategorija')
            ->where('idKategorija', '=', $id)
            ->delete();

        return $rez;

    }
}
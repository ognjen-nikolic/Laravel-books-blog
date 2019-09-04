<?php

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;

class Komentar
{
    public function insertKomentar($komentar, $idRecenzija, $idKorisnik)
    {
        DB::table('komentar')
            ->insert([
                'komentar' => $komentar,
                'idKorisnik' => $idKorisnik,
                'idRecenzija' => $idRecenzija
            ]);
    }

    public function getAll()
    {
        $rez = \DB::table('komentar')
            ->join('korisnik', 'korisnik.idKorisnik', '=', 'komentar.idKorisnik')
            ->join('recenzija', 'recenzija.idRecenzija', '=', 'komentar.idRecenzija')
            ->get();

        return $rez;
    }

    public function deleteKomentar($id){

        $rez = \DB::table('komentar')
            ->where('idKomentar', '=', $id)
            ->delete();

        return $rez;

    }

}
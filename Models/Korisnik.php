<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Korisnik extends Model
{
    public $idKorisnik;

    public function getAllKorisnici()
    {
        $rez = \DB::table('korisnik as k')
            ->join('uloga as u', 'u.idUloga', '=', 'k.idUloga')
            ->where('k.idUloga', '=', 2)
            ->get();

        return $rez;
    }

    public function getKorisnik($username, $pass)
    {
        $rez = DB::table('korisnik')
            ->where([
                ['korisnickoIme', '=', $username],
                ['lozinka', '=', $pass]
            ])
            ->first();

        return $rez;
    }

    public function insertKorisnik($username, $email, $password)
    {
        DB::table('korisnik')
            ->insert([
                ['korisnickoIme' => $username, 'email' => $email, 'lozinka' => $password,'idUloga' => 2]
            ]);
    }


    public function dohvatiID($id){
        $rez=DB::table('korisnik')
            ->join('uloga','korisnik.idUloga','=','uloga.idUloga')
            ->where('idKorisnik', '=', $id)
            ->first();

        return $rez;
    }

    public function deleteKorisnik($id)
    {
        $rez = \DB::table('korisnik')
            ->where('idKorisnik', '=', $id)
            ->delete();

        return $rez;
    }
}

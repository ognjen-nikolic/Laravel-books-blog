<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Recenzija extends Model
{
    public $idKnjiga;
    public function getLatest()
    {
        $rez = DB::table('recenzija')
            ->join('galerija', 'galerija.idGalerija', '=', 'recenzija.idSlika')
            ->join('korisnik', 'korisnik.idKorisnik', '=', 'recenzija.idKorisnik')
            ->limit(3)
            ->orderBy('datumKreiranja', 'desc')
            ->get();

        return $rez;
    }

    public function getKnjigaById($id)
    {
        $rez = DB::table('recenzija')
            ->join('galerija', 'galerija.idGalerija', '=', 'recenzija.idSlika')
            ->join('korisnik', 'korisnik.idKorisnik', '=', 'recenzija.idKorisnik')
            ->where('idRecenzija', '=', $id)
            ->first();

        return $rez;
    }

    public function getKorisnikById($id)
    {
        $rez = DB::table('korisnik')
            ->join('komentar', 'korisnik.idKorisnik', '=', 'komentar.idKorisnik')
            ->where('idRecenzija', '=', $id)
            ->get();

        return $rez;
    }

    public function getKnjigeByKorisnikId($korisnikId)
    {
        $rez = DB::table('recenzija')
            ->join('galerija', 'galerija.idGalerija', '=', 'recenzija.idSlika')
            ->join('korisnik', 'korisnik.idKorisnik', '=', 'recenzija.idKorisnik')
            ->where('korisnik.idKorisnik', '=', $korisnikId)
            ->paginate(2);

        return $rez;
    }

    public function getAllBooks() {
        $rez = DB::table('recenzija')
            ->join('galerija', 'galerija.idGalerija', '=', 'recenzija.idSlika')
            ->join('korisnik', 'korisnik.idKorisnik', '=', 'recenzija.idKorisnik')
            ->join('kategorija', 'kategorija.idKategorija', '=', 'recenzija.idKategorija')
            ->join('uloga', 'uloga.idUloga', '=', 'korisnik.idUloga')
            ->orderBy('idRecenzija', 'asc')
            ->paginate(4);

        return $rez;
    }

    public function getPopular()
    {
        $rez = DB::table('recenzija')
            ->join('galerija', 'galerija.idGalerija', '=', 'recenzija.idSlika')
            ->join('korisnik', 'korisnik.idKorisnik', '=', 'recenzija.idKorisnik')
            ->orderBy('brojKomentara', 'desc')
            ->limit(3)
            ->get();

        return $rez;
    }



    public function insertKnjiga($naziv, $autor, $opis, $tekst, $idSlika, $idKategorija, $idKorisnik)
    {
        $rez = \DB::table('recenzija')
            ->insert([
                'naziv' => $naziv,
                'autor' => $autor,
                'opis' => $opis,
                'tekst' => $tekst,
                'idSlika' => $idSlika,
                'idKategorija' => $idKategorija,
                'idKorisnik' => $idKorisnik
            ]);
    }

    public function updateKnjiga($id, $naziv, $autor, $idKategorija, $opis, $tekst, $idSlika)
    {
        DB::table('recenzija')
            ->where('idRecenzija', '=', $id)
            ->update([
                'naziv' => $naziv,
                'autor' => $autor,
                'idKategorija' => $idKategorija,
                'opis' => $opis,
                'tekst' => $tekst,
                'idSlika' => $idSlika
            ]);
    }

    public function getRecenzija($id)
    {
        $rez = DB::table('recenzija')
            ->where('idRecenzija', '=', $id)
            ->first();

        return $rez;
    }

    public function deleteRecenzija($id)
    {
        DB::table('recenzija')
            ->where('idRecenzija', '=', $id)
            ->delete();
    }

    public function increaseBrojKomentara($idRecenzija)
    {
        DB::table('recenzija')
            ->where('idRecenzija', '=', $idRecenzija)
            ->update([
                'brojKomentara' => DB::raw('brojKomentara + 1')
            ]);
    }

    public function getKnjigaByKategorijaId($idKategorija)
    {
        $rez = DB::table('recenzija')
            ->join('galerija', 'galerija.idGalerija', '=', 'recenzija.idSlika')
            ->join('korisnik', 'korisnik.idKorisnik', '=', 'recenzija.idKorisnik')
            ->where('idKategorija', '=', $idKategorija)
            ->get();

        return $rez;
    }

    public function getKnjigaByIme($ime)
    {
        $rez = DB::table('recenzija')
            ->join('galerija', 'galerija.idGalerija', '=', 'recenzija.idSlika')
            ->join('korisnik', 'korisnik.idKorisnik', '=', 'recenzija.idKorisnik')
            ->where('recenzija.naziv', 'like', '%'. $ime.'%')
            ->get();

        return $rez;
    }

}
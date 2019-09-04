<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Meni extends Model
{
    public function getAll(){
        $rez = DB::table('meni')
            ->get();

        return $rez;
    }

    public function getById($id)
    {
        $rez = \DB::table('meni')
            ->where('idMeni', '=', $id)
            ->first();
        return $rez;
    }

    public function insertMeni($meni,$putanja)
    {
        $rez = \DB::table('meni')
            ->insert([
                'meni' => $meni,
                'putanja' => $putanja
            ]);
        return $rez;
    }

    public function updateMeni($idMeni, $meni, $putanja)
    {
        $rez = \DB::table('meni')
            ->where('idMeni', '=', $idMeni)
            ->update([
                'meni' => $meni,
                'putanja' => $putanja
            ]);
        return $rez;
    }

    public function deleteMeni($id){

        $rez = \DB::table('meni')
            ->where('idMeni', '=', $id)
            ->delete();

        return $rez;

    }
}

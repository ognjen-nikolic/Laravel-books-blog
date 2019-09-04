<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KontaktController extends Controller
{
    public function kontakt(Request $request)
    {
        if($request->has('btnPosalji')) {
            $email = $request->input('tbEmail');
            $naslov = $request->input('tbNaslov');
            $poruka = $request->input('taPoruka');

            try {
                $to = "miljana@gmail.com";
                $header= "From: " . $email;

                mail($to, $naslov, $poruka,$header);
                return redirect()->back()->with('poruka', 'Uspesno poslata poruka.');

            }
            catch (\Exception $e) {
                return redirect()->back()->with('poruka', 'Greska.');
            }
        }
    }
}
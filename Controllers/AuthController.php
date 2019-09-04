<?php

namespace App\Http\Controllers;

use App\Http\Models\Recenzija;
use App\Http\Models\Korisnik;
use App\Http\Models\Meni;
use App\Http\Requests\KorisnikRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $data = [];

    public function __construct()
    {
        $meni = new Meni();

        try {
            $this->data['meni'] = $meni->getAll();
        }
        catch (\Exception $e) {
            \Log::error('Desila se greska: '.$e->getMessage());
        }
    }

    public function prijavaForma()
    {
        return view('user.pages.logovanje', $this->data);
    }

    public function prijava(Request $request)
    {
        if($request->has('btnLogin')) {
            $username = $request->input('tbKorisnickoIme');
            $password = md5($request->input('tbLozinka'));

            $korisnikL = new Korisnik();

            $korisnik = $korisnikL->getKorisnik($username, $password);

            if($korisnik) {
                if($korisnik->idUloga == 2) {
                    $request->session()->put('korisnik', $korisnik);
                }
                else {
                    $request->session()->put('admin', $korisnik);
                }
                return redirect('/')->with('poruka', 'Uspesno ste se ulogovali, '.$korisnik->korisnickoIme);
            }
            else {
                return redirect()->back()->with('poruka', 'Greska pri logovanju!');

            }
        }
    }

    public function registracijaForma()
    {
        return view('user.pages.registracija', $this->data);
    }

    public function registracija(KorisnikRequest $request)
    {
        if($request->has('btnReg')) {
            $username = $request->input('tbKorisnickoIme');
            $email = $request->input('tbEmail');
            $password = md5($request->input('tbLozinka'));
            $passAgain = md5($request->input('tbLozinkaProvera'));

            $korisnikR = new Korisnik();

            try {
                $korisnik = $korisnikR->insertKorisnik($username, $email, $password);
                return redirect('/prijava-forma')->with('poruka', 'Uspesna registracija.');
            }
            catch (\Exception $e) {
                return redirect()->back()->with('poruka', 'Neuspesna registracija. Pokusajte ponovo.');
                \Log::error($e->getMessage());
            }


        }
    }

    public function odjava(Request $request)
    {
        if($request->session('korisnik'))
        {
            $request->session()->forget('korisnik');
            $request->session()->flush();

            return redirect('/')->with('poruka', 'Uspesna odjava.');
        }

        if($request->session('admin'))
        {
            $request->session()->forget('admin');
            $request->session()->flush();

            return redirect('/')->with('poruka', 'Uspesna odjava.');
        }
    }

}
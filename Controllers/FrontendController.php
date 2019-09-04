<?php

namespace App\Http\Controllers;

use App\Http\Models\Kategorija;
use App\Http\Models\Komentar;
use App\Http\Models\Slika;
use App\Http\Models\Recenzija;
use App\Http\Models\Korisnik;
use App\Http\Models\Meni;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    private $data = [];

    private $idKnjige;

    public function __construct()
    {
        $meni = new Meni();
        $knjige = new Recenzija();
        $kategorije = new Kategorija();


        try {
            $this->data['meni'] = $meni->getAll();
            $this->data['kategorije'] = $kategorije->getAll();
            return view('user.pages.knjige', $this->data);
        }
        catch (\Exception $e) {

            \Log::error('Desila se greska: '.$e->getMessage());
        }

    }

    public function index()
    {
        $knjige = new Recenzija();

        $this->data['knjige'] = $knjige->getLatest();
        $this->data['knjigep'] = $knjige->getPopular();

        return view('user.pages.pocetna', $this->data);

    }



    public function getAllBooks() {
        $knjigaModel = new Recenzija();

        $this->data['knjige'] = $knjigaModel->getAllBooks();

        return view('user.pages.knjige', $this->data);
    }

    public function getKnjigaById(Request $request,$id)
    {
        if($request->session()->has('korisnik')) {
            $profil = $request->session()->get('korisnik');
            $this->data['profil']=$profil;
        }

        $knjiga = new Recenzija();

        $this->data['knjiga'] = $knjiga->getKnjigaById($id);

        $this->idKnjige = $this->data['knjiga']->idRecenzija;
        $this->data['komentar'] = $knjiga->getKorisnikById($this->idKnjige);

        return view('user.pages.post', $this->data);

    }

    public function kontakt()
    {
        return view('user.pages.kontakt', $this->data);
    }

    public function autor()
    {
        return view('user.pages.autor', $this->data);
    }

    public function profil(Request $request)
    {
        $knjigaModel = new Recenzija();

        if(session('korisnik')){
            $korisnikId = $request->session()->get('korisnik')->idKorisnik;

            $this->data['knjige'] = $knjigaModel->getKnjigeByKorisnikId($korisnikId);

            return view('user.pages.profil', $this->data);
        }
        else if(session('admin')) {
            return view('admin.pages.pocetna', $this->data);
        }
    }

    public function getKnjigeKorisnika(Request $request, $id) {

        $knjigaModel = new Recenzija();
        $korisnikModel = new Korisnik();

        $this->data['knjige'] = $knjigaModel->getKnjigeByKorisnikId($id);

//        $korisnikId = $request->session()->get('korisnik')->idKorisnik;
        if($request->session()->has('korisnik')){
            $korisnikId = $request->session()->get('korisnik')->idKorisnik;
            if($korisnikId == $id)
            {
                return redirect('/profil');
            }
            else
            {
                return view('user.pages.books', $this->data);
            }
        }

        return view('user.pages.books', $this->data);

    }

    public function ostaviKomentar(Request $request, $idRecenzija, $idKorisnik)
    {
        if($request->has('btnObjavi')) {
            $komentar = $request->input('taKomentar');

            $profil=$request->session()->get('korisnik');
            $komentarModel = new Komentar();
            $recenzijaModel = new Recenzija();

            try {
                $komentarModel->insertKomentar($komentar, $idRecenzija, $profil->idKorisnik);
                $recenzijaModel->increaseBrojKomentara($idRecenzija);

                return redirect('/')->with('poruka', 'Uspesno ste uneli komentar.');
            }
            catch (\Exception $e) {
                return redirect('/')->with('poruka', 'Doslo je do greske prilikom unosa komentara.');
                \Log::error('Desila se greska: '.$e->getMessage());
            }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

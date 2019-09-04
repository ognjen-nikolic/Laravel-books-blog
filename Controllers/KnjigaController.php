<?php

namespace App\Http\Controllers;

use App\Http\Models\Galerija;
use App\Http\Models\Kategorija;
use App\Http\Models\Meni;
use App\Http\Models\Recenzija;
use App\Http\Requests\RecenzijaRequest;
use Illuminate\Http\Request;

class KnjigaController extends Controller
{
    private $data = [];

    public function __construct()
    {
        $meni = new Meni();
        $kategorije = new Kategorija();

        try {
            $this->data['meni'] = $meni->getAll();
            $this->data['kategorije'] = $kategorije->getAll();
        }
        catch (\Exception $e) {
            \Log::error('Desila se greska: '.$e->getMessage());
        }
    }

    public function dodavanjeForma()
    {
        return view('user.pages.insertKnjiga', $this->data);
    }



    public function insert(RecenzijaRequest $request)
    {
        if($request->has('btnUnesi'))
        {
            $idKorisnik = $request->session()->get('korisnik')->idKorisnik;

            $naziv = $request->input('tbNaziv');
            $autor = $request->input('tbAutor');
            $opis = $request->input('taKratakOpis');
            $tekst = $request->input('taTekst');
            $idSlika = $request->file('fSlika');
            $imeSlike = $idSlika->getClientOriginalName();
            $putanja = '/img/'.$imeSlike;
            $idKategorija = $request->input('ddlKategorija');



            if($idSlika->isValid())
            {

                $idSlika->move(public_path()."/img/", $imeSlike);
                try
                {
                    $galerije=new Galerija();
                    $galerija=$galerije->insertGalerija($putanja,$naziv);

                    $idslike=$galerije->getOneForInsertRecenzija($putanja);

                    $recenzijaI = new Recenzija();
                    $recenzija = $recenzijaI->insertKnjiga($naziv, $autor, $opis, $tekst, $idslike->idGalerija, $idKategorija,$idKorisnik);
                    return redirect('/profil')->with('poruka', 'Uspesno ste uneli recenziju.');
                }
                catch(\Exception $exception)
                {
                    return redirect()->back()->with('poruka', 'Problem u bazi.');
                    \Log::error($exception->getMessage());
                }
            }

        }
    }

            public function izmenaForma(Request $request,$id)
            {
                if($request->session()->has('korisnik')){
                    $profil=$request->session()->get('korisnik');
                    $this->data['profil']=$profil;
                }

                $recenzija=new Recenzija();
                $rec=$recenzija->getKnjigaById($id);
                if($profil->idKorisnik==$rec->idKorisnik)
                {
                $this->data['recenzija']=$rec;
                return view('user.pages.updateKnjiga', $this->data );}
                else
                    {
                        return redirect('/')->with('poruka','Nemate pristupna prava');
                    }
            }

            public function izmena(RecenzijaRequest $request, $id)
            {
                if ($request->has('btnIzmeni')) {
                    $idKorisnik = $request->session()->get('korisnik')->idKorisnik;
                    $naziv = $request->input('tbNaziv');
                    $autor = $request->input('tbAutor');
                    $opis = $request->input('taKratakOpis');
                    $tekst = $request->input('taTekst');
                    $idStaraSlika = $request->input('idSlika');

                    $slika = $request->file('fSlika');
                    $imeSlike = $slika->getClientOriginalName();
                    $putanja = '/img/' . $imeSlike;

                    $idKategorija = $request->input('ddlKategorija');


                    if ($slika->isValid()) {

                        $slika->move(public_path() . "/img/", $imeSlike);
                        $recenzijaModel = new Recenzija();
                        $galerijaModel = new Galerija();

                        try
                        {
                            $galerijaModel->updateSlika($idStaraSlika,$putanja, $naziv);
                            $recenzijaModel->updateKnjiga($id, $naziv, $autor, $idKategorija, $opis, $tekst, $idStaraSlika);

                            return redirect('/profil')->with('poruka', 'Uspesno ste izmenili recenziju.');
                        }
                        catch(\Exception $exception)
                        {
                            return redirect()->back()->with('poruka', 'Problem u bazi.');
                            \Log::error($exception->getMessage());
                        }
                    }

                    }
                }

    public function brisanjeKnjige(Request $request,$id)
    {
        $recenzijaModel = new Recenzija();
        $galerijaModel = new Galerija();
        $knjiga = $recenzijaModel->getKnjigaById($id);
        $slikaId = $recenzijaModel->getRecenzija($id)->idSlika;
        if ($request->session()->has('korisnik')) {
            $profil = $request->session()->get('korisnik');
        }
        if ($profil->idKorisnik == $knjiga->idKorisnik)
        {
            try {
                $galerijaModel->deleteSlika($slikaId);

                $recenzijaModel->deleteRecenzija($id);

                return redirect('/')->with('poruka', 'Uspesno obrisana recenzija.');

            }
            catch (\Exception $e){
                return redirect('/')->with('poruka', 'Problem prilikom brisanja recenzije.');
                \Log::error($exception->getMessage());
            }
        }

        else { return redirect('/')->with('poruka','nemate prava pristupa');}


    }

    public function filterKnjigeByKategorijaId($idKategorija)
    {
        $recenzijaModel = new Recenzija();

        $knjigePoKategoriji = $recenzijaModel->getKnjigaByKategorijaId($idKategorija);

        return $knjigePoKategoriji;
    }

    public function filterKnjigeByName(Request $request)
    {
        $ime = $request->query('ime');

        $recenzijaModel = new Recenzija();

        $knjigePoImenu = $recenzijaModel->getKnjigaByIme($ime);

        return $knjigePoImenu;
    }
}

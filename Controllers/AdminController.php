<?php

namespace App\Http\Controllers;

use App\Http\Models\Galerija;
use App\Http\Models\Kategorija;
use App\Http\Models\Komentar;
use App\Http\Models\Korisnik;
use App\Http\Models\Meni;
use App\Http\Models\Recenzija;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $data;
//Upravljanje kategorijom
    public function getAllKategorije(){
        $kategorije = new Kategorija();
        $this->data['kategorija'] = $kategorije->getAll();
        return view('admin.pages.kategorija', $this->data);
    }

    public function dodajKategorijuForma()
    {
        return view('admin.pages.dodajKategoriju');
    }

    public function insertKategorija(Request $request)
    {
       if($request->has('btnDodaj'))
       {
           $kategorija = $request->input('tbKategorija');
           if($kategorija)
           {
               try
               {
                   $kategorijaModel = new Kategorija();
                   $kategorijaM = $kategorijaModel->insertKategorija($kategorija);
                   return redirect('/admin/kategorije')->with('poruka', 'Uspesno ste uneli kategoriju.');

               }
               catch(\Exception $exception)
               {
                   return redirect()->back()->with('poruka', 'Problem u bazi.');
                   \Log::error($exception->getMessage());
               }
           }

       }

        return view('admin.pages.kategorija');
    }
    public function updateKategorijaForma($id)
    {
        $kategorijaModel = new Kategorija();
        $kategorijaM = $kategorijaModel->getById($id);
        $this->data['kategorija'] = $kategorijaM;

        return view('admin.pages.izmeniKategoriju', $this->data);
    }

    public function updateKategorija(Request $request, $id)
    {
        if($request->has('btnIzmeni'))
        {
            $kategorija = $request->input('tbKategorija');
            $kategorijaModel = new Kategorija();
            $kM = $kategorijaModel->getById($id);
            $this->data['kategorija'] = $kM;
            try
            {
               $km1 = $kategorijaModel->updateKategorija($id,$kategorija);
                return redirect('/admin/kategorije')->with('poruka','Uspesno ste izmenili kategoriju');
            }
            catch(\Exception $exception)
            {
                return redirect()->back()->with('poruka', 'Problem u bazi.');
                \Log::error($exception->getMessage());
            }
        }
    }

    public function deleteKategorija($id)
    {
        $kategorijaModel = new Kategorija();
        try
        {
            $kategorijaM = $kategorijaModel->deleteKategorija($id);
            return redirect()->back()->with('poruka', 'Uspesno obrisana kategorija.');
        }
        catch(\Exception $exception)
        {
            return redirect()->back()->with('poruka', 'Problem u bazi.');
            \Log::error($exception->getMessage());
        }
    }
//Upravljanje korisnikom
    public function getAllKorisnici()
    {
        $korisnici = new Korisnik();
        $this->data['korisnik'] = $korisnici->getAllKorisnici();

        return view('admin.pages.korisnik', $this->data);
    }

    public function deleteKorisnik($id)
    {
        $korisnikModel = new Korisnik();
        try
        {
            $korisnikM = $korisnikModel->deleteKorisnik($id);
            return redirect()->back()->with('poruka', 'Uspesno obrisan korisnik.');
        }
        catch(\Exception $exception)
        {
            return redirect()->back()->with('poruka', 'Problem u bazi.');
            \Log::error($exception->getMessage());
        }
    }

    public function aktivnostiKorisnika($id)
    {
        $korisnici = new Korisnik();
        $this->data['korisnik'] = $korisnici->dohvatiID($id);

        return view('admin.pages.korisnik', $this->data);
    }



//Upravljanje recenzijom-knjigom
    public function getAllRecenzije()
    {
        $recenzije = new Recenzija();
        $this->data['recenzije'] = $recenzije->getAllBooks();

        return view('admin.pages.recenzije', $this->data);
    }

    public function deleteRecenzija($id)
    {
        $recenzije = new Recenzija();
        $galerija = new Galerija();
        $recenzijaPoId = $recenzije->getKnjigaById($id);

        try{
            $rec = $recenzije->deleteRecenzija($id);
            $gal = $galerija->deleteSlika($recenzijaPoId->idSlika);
            return redirect()->back()->with('poruka', 'Uspesno obrisana recenzija.');
        }
        catch(\Exception $exception)
        {
            return redirect()->back()->with('poruka', 'Problem u bazi.');
            \Log::error($exception->getMessage());
        }
    }
//Upravljanje menijem
    public function getAllMeni()
    {
        $meni = new Meni();
        $this->data['meni'] = $meni->getAll();
        return view('admin.pages.meni', $this->data);
    }

    public function dodajMeniForma()
    {
        return view('admin.pages.dodajMeni');
    }

    public function insertMeni(Request $request)
    {
        if($request->has('btnDodaj'))
        {
            $meni = $request->input('tbMeni');
            $putanja = $request->input('tbPutanja');
            if($meni)
            {
                try
                {
                    $meniModel = new Meni();
                    $meniM = $meniModel->insertMeni($meni, $putanja);
                    return redirect('/admin/meni')->with('poruka', 'Uspesno ste uneli meni.');

                }
                catch(\Exception $exception)
                {
                    return redirect()->back()->with('poruka', 'Problem u bazi.');
                    \Log::error($exception->getMessage());
                }
            }

        }

        return view('admin.pages.meni');
    }

    public function updateMeniForma($id)
    {
        $meniModel = new Meni();
        $mM = $meniModel->getById($id);
        $this->data['meni'] = $mM;

        return view('admin.pages.izmeniMeni', $this->data);
    }

    public function updateMeni(Request $request, $id)
    {
        if($request->has('btnIzmeni'))
        {
            $meni = $request->input('tbMeni');
            $putanja = $request->input('tbPutanja');
            $meniModel = new Meni();
            $mM = $meniModel->getById($id);
            $this->data['meni'] = $mM;
            try
            {
                $mM1 = $meniModel->updateMeni($id, $meni, $putanja);
                return redirect('/admin/meni')->with('poruka','Uspesno ste izmenili meni');
            }
            catch(\Exception $exception)
            {
                return redirect()->back()->with('poruka', 'Problem u bazi.');
                \Log::error($exception->getMessage());
            }
        }
    }

    public function deleteMeni($id)
    {
        $meniModel = new Meni();
        try
        {
            $meniM = $meniModel->deleteMeni($id);
            return redirect()->back()->with('poruka', 'Uspesno obrisana meni stavka.');
        }
        catch(\Exception $exception)
        {
            return redirect()->back()->with('poruka', 'Problem u bazi.');
            \Log::error($exception->getMessage());
        }
    }

    //Upravljanje komentarima
    public function getAllKomentar()
    {
        $komentar = new Komentar();
        $this->data['komentar'] = $komentar->getAll();

        return view('admin.pages.komentar', $this->data);
    }

    public function deleteKomentar($id)
    {
        $komentar = new Komentar();
        try
        {
            $kom = $komentar->deleteKomentar($id);
            return redirect()->back()->with('poruka', 'Uspesno obrisan komentar.');
        }
        catch(\Exception $exception)
        {
            return redirect()->back()->with('poruka', 'Problem u bazi.');
            \Log::error($exception->getMessage());
        }
    }

}

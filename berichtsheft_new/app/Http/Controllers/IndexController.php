<?php


namespace App\Http\Controllers;




use App\Models\Bericht;
use App\Models\Mitarbeiter;

class IndexController extends Controller
{
    public function index($name){

        /*
        $mitarbeiter=new \App\Models\Mitarbeiter();
        $mitarbeiter->Vorname="Pascal";
        $mitarbeiter->Nachname="Kunze";
        $mitarbeiter->save();
        */

        $mitarbeiter=Mitarbeiter::where('id',1)->first();
        $bericht=new Bericht();
        $bericht->mitarbeiter_id=$mitarbeiter->id;
        $bericht->Bericht="test";
        $bericht->Datum=new \DateTime();
        $bericht->save();




        return view('index',['name'=>$mitarbeiter->Vorname.' '.$mitarbeiter->Nachname]);
    }
}

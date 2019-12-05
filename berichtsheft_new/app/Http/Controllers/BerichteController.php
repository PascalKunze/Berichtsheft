<?php


namespace App\Http\Controllers;


use App\Models\Bericht;
use Illuminate\Database\Eloquent\Model;

class BerichteController extends Controller
{
    public function getByUserId($userID){
        /**@var Model $berichte*/
        $berichte=Bericht::where("mitarbeiter_id",$userID)->get();
        return view("berichtsview",["berichte"=>$berichte]);
    }
}

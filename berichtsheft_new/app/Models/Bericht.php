<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Bericht extends Model
{
    protected $table="tbl_Berichte";

    public function mitarbeiter(){
        return $this->belongsTo(Mitarbeiter::class,'mitarbeiter_id');
    }
}

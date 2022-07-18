<?php

namespace App\Models;
use app\Models\appeloffre;
use app\Models\Projet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caution extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $fillable =['appeloffres_id' , 'typecaution','datedebit' , 'montant' , 'daterestitution',
    'bqdebit' , 'refchq' , 'dateconstitution','datecredit','bqcredit','moycredit','refcredit','etat' ,'projet_id'];
    public function Appeloffres(){
        return $this->hasMany(appeloffre::class);
    }
    public function Projet(){
        return $this->hasMany(Projet::class);
    }
}

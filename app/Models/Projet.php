<?php

namespace App\Models;
use app\Models\Client;
use app\Models\phase;
use app\Models\Equipe;
use app\Models\Caution;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $table = 'projets';
    protected $fillable =['client_id' , 'objet' , 'montant_ht' ,  'nom',  "ref",  'montant_ttc','type_projet','dateosc','delai_execution' , 'etattech' , 'etatfin'];
    public function client(){
        return $this->hasMany(Client::class );
    }
    public function equipe(){
        return $this->belongsTo(Equipe::class);
    }
    public function cautions(){
        return $this->belongsTo(Caution::class);
    }
    public function phases(){
        return $this->hasMany(phase::class);
    }


}

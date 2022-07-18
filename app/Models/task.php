<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $fillable = [ 'client_id' , 'projet_id', 'datedebut' , 'datefin' , 'nombre_heure'];
    public function User(){
        return $this->hasMany(User::class);
    }
    public function Projet(){
        return $this->hasMany(Projet::class);
    }

}

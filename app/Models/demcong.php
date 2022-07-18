<?php

namespace App\Models;

use app\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demcong extends Model
{
    use HasFactory;
    protected $fillable = ['user_id' , 'datedebut' , 'datefin' , 'quantite_jour' , 'commenter' , 'is_valide' ,'motifconge'];
    public function users (){
         return $this->hasMany(User::class);
    }
}

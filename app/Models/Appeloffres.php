<?php

namespace App\Models;
use app\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appeloffres extends Model
{
    use HasFactory;
    protected $fillable =['user_id' , 'default','shifts' , 'client_id' ,'projet_id' , 'objet' , 'date_ouv','typesoumission' ,'ref'];
    protected $guarded =[];
    public function Client(){
        return $this->hasMany(Client::class);
    }

}

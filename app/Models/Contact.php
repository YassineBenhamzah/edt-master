<?php

namespace App\Models;
use app\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable =['nom' , 'prenom' , 'client_id' , 'fonction','telephone','gsm','mail'];
    protected $guarded =[];
    public function Client(){
        return $this->hasMany(Client::class);
    }
}

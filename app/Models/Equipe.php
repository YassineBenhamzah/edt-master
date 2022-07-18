<?php

namespace App\Models;
use app\Models\User;
use app\Models\Projet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;
    protected $fillable =['user_id' , 'default','shifts' , 'status_id' ,'projet_id'];

    protected $guarded =[];
    public function User(){
        return $this->hasMany(User::class);
    }
    public function projet(){
        return $this->hasMany(Projet::class);
    }
}

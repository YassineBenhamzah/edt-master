<?php

namespace App\Models;

use app\Models\laborcost;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personel extends Model
{
    use HasFactory;
    protected $fillable =['nom' , 'prenom','mail' , 'telephone' ,'cine'];
    public function laborcosts(){
        return $this->belongsTo(laborcost::class);
    }
}

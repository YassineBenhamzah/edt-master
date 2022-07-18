<?php

namespace App\Models;
use app\Models\Personel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laborcost extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $fillable =['user_id' , 'startingdate' , 'finaldate' , 'cost' , 'isarchived'   ];
    public function users (){
        return $this->hasMany(User::class);
    }
}

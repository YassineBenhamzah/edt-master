<?php

namespace App\Models;
use app\Models\Projet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phase extends Model
{
    use HasFactory;
    protected $fillable = ['projet_id' , 'name' , 'nb_total_bugees' , 'start_date', 'closing_date', 'expclosing_date'];
    public function projets() {
        return $this->belongsTo(Projet::class);
    }
}

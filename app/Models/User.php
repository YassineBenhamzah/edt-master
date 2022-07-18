<?php

namespace App\Models;
use app\Models\Equipe;
use app\Models\laborcost;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telephone',
        'cine',
        'dateentree',
        'datesortie',
        'profil',
        'niveauetude',
        'role_id'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    public function equipe(){
        return $this->belongsToMany(Equipe::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function laborcosts(){
        return $this->belongsTo(laborcost::class);
    }
    public function demcongs(){
        return $this->hasMany(demcong::class);
    }
}

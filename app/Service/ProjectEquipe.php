<?php

use App\Models\ProjetEquipe;
use App\Services;
use GuzzleHttp\Promise\Create;

class ProjectEquipe {
    public static function insert_into_projet_equipe($projet_id, $equipe_id)
    {
        return ProjetEquipe::Create([
        'id_p ' => $projet_id,
        'id'=> $equipe_id,

        ]);
    }
}

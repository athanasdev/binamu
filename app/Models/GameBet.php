<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameBet extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function match(){
        return $this->belongsTo('App\Models\FootballMatch', 'match_id');
    }

    public function score(){
        return $this->belongsTo('App\Models\MatchDemoScore', 'score_id');
    }
}

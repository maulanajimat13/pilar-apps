<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamLeader extends Model
{
    protected $guarded =['id'];
    protected $table = 'team_leaders';
    use HasFactory;

    public function team() {
        return $this->hasMany(Team::class);
    }

}

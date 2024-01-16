<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Route;
use App\Models\TeamLeader;


class Team extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected  $with = ['route','leader'];

    public function route() {
        return $this->belongsTo(Route::class, 'route_id');
    }

    public function leader() {
        return $this->belongsTo(TeamLeader::class, 'team_leader_id');
    }

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\Presenter;


class TeamDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected  $with = ['presenter','team'];

    public function presenter() {
        return $this->belongsTo(Presenter::class, 'bp_id');
    }

    public function team() {
        return $this->belongsTo(Team::class, 'team_id');
    }
}

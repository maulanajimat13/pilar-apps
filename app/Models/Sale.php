<?php

namespace App\Models;
use App\Models\Team;
use App\Models\Presenter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Sale extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected  $with = ['team','presenter'];

    public function team() {
        return $this->belongsTo(Team::class, 'team_id');
    }
    public function presenter() {
        return $this->belongsTo(Presenter::class, 'bp_id');
    }
}

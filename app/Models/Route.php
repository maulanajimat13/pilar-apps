<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Area;

class Route extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected  $with = ['area'];

    public function area() {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function team()
    {
        return $this->hasMany(Team::class);
    }
}

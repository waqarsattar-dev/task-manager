<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'team_id',
        'description'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    
}

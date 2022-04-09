<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class players extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'players';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'last_name',
        'first_name',
        'age',
        'height',
        'team_id',
        'debut_year',
        'position',
        'is_active'
    ];


    public function team(){
        return $this->belongsTo('App\Models\teams', 'team_id');
    }
}

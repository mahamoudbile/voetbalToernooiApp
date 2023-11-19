<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Generate extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'matches';

    protected $fillable = ['teamA', 'teamB'];
    
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'matches');
    }
    
}

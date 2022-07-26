<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wbs extends Model
{
    use HasFactory;
    // table名紐付け
    protected $table = 'wbs';

    protected $fillable = [
        'mainItem',
        'subItem',
        'plansStartDay',
        'plansFinishDay',
        'resultStartDay',
        'resultsFinishDay',
        'progress',
        'productionCost',
        'rep'
    ];
}

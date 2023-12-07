<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'qname',
        'qoption1',
        'qoption2',
        'qoption3',
        'qoption4',
        'type',
        
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class theoryresponse extends Model
{
    use HasFactory;
    protected $fillable = [
        'prn',
        'roll',
        'name',
        'sem',
        'department_name',
        'class',
        'div',
        'subject',
        'sub_teacher',
        'Q1',
        'Q2',
        'Q3',
        'Q4',
        'Q5',
        'Q6',
        'Q7',
        'Q8',
        'Q9',
        'Q10',
        'feedback-count',


     ];
}

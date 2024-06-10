<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'StudentName',
        'StudentContact',
        'StudentEmail',
    ];

    public function bills()
    {
        return $this->hasMany(Bill::class, 'student_id', 'id');
    }
}

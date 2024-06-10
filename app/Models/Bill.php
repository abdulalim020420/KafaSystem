<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $primaryKey = 'billID';

    protected $fillable = [
        'student_id',
        'billDescription',
        'billAmount',
        'billDueDate',
        'billStatus',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'billID', 'billID');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }
}

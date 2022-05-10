<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function batch() {
        return $this->belongsTo(Batch::class);
    }

    public function grades() {
        return $this->hasMany(Grade::class);
    }

     protected static function booted() {
        parent::boot();

        static::deleting(function($student) {
             $student->grades()->delete();
        });
    }
}

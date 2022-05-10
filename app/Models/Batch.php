<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function faculty() {
        return $this->belongsTo(Faculty::class);
    }

    protected static function booted() {
        parent::boot();

        static::deleting(function($batch) {
            foreach ($batch->students as $student)
            $student->delete();
        });
    }
}

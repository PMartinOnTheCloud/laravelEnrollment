<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Career;
use App\Models\Enrolment;

class Term extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'start', 'end', 'active'];

    public function enrolments() {
        return $this->hasMany(Enrolment::class);
    }

    public function careers() {
        return $this->hasMany(Career::class);
    }
}

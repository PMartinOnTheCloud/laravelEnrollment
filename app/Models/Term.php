<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Career;
use App\Models\Enrolment;

class Term extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'active'];

    public function enrolments() {
        return $this->hasMany(Enrolment::class);
    }

    public function careers() {
        return $this->hasMany(Career::class);
    }
}

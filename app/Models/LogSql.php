<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Req_enrol;

class LogSql extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'level', 'message', 'time_action_realized'];

    public function req_enrols() {
        return $this->belongsTo(Req_enrol::class);
    }
}

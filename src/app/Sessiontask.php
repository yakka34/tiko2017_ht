<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sessiontask extends Model
{
    //
    protected $fillable = ['task_id','session_id','finished_at','correct'];

    public function session() {
        return $this->belongsTo(Session::class);
    }

    public function task() {
        return $this->belongsTo(Task::class);
    }

    public function taskattempts() {
        return $this->hasMany(Taskattempt::class);
    }
}

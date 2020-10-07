<?php

namespace App\Model\Logs;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    protected $table = 'log_activities';
    protected $primaryKey = 'id';
    protected $fillable = ['subject', 'url', 'method', 'ip', 'agent', 'user_id',];

    public $timestamps = true;
}

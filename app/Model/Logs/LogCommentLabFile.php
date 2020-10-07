<?php

namespace App\Model\Logs;

use Illuminate\Database\Eloquent\Model;

use App\Model\Logs\LogCommentLab;

class LogCommentLabFile extends Model
{
    protected $table = 'log_comment_lab_files';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [''];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    public function logCommentLab()
    {
        return $this->belongsTo(LogCommentLab::class);
    }
}

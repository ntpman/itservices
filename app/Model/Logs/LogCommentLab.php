<?php

namespace App\Model\Logs;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Model\BasicInformations\SurveyStatus;
use App\Model\Employee\Lab;
use App\Model\Logs\LogCommentLabFile;

class LogCommentLab extends Model
{
    protected $table = 'log_comment_labs';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [''];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function surveyStatus()
    {
        return $this->belongsTo(SurveyStatus::class);
    }

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    public function logCommentLabFiles()
    {
        return $this->hasMany(LogCommentLabFile::class);
    }
}

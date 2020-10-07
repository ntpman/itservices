<?php

namespace App\Model\Employee;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Ask extends Model
{
    protected $table = 'asks';
    protected $primaryKey = 'id';

    /*
    protected $fillable = [''];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    // Defining Relationships One To Many
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

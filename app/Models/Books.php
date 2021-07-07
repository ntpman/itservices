<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Books extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';

    protected $gruaded = [];

    public $timestamps = true;


    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

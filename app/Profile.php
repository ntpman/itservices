<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $primaryKey = 'id';

    /*
    protected $fillable = [
        '', '', '',
    ];
    */
    
    protected $guarded = [];

    public $timestamps = true;

    // Eloquent: Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

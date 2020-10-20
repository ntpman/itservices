<?php

namespace App\Model\Asset;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Asset extends Model
{
    protected $table = 'assets';

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

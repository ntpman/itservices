<?php

namespace App\Model\Asset;

use Illuminate\Database\Eloquent\Model;

use App\Model\Supplier\Supplier;

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

    /**
     * Eloquent: Relationships
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}

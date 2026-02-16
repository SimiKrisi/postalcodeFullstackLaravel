<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postalcode extends Model
{
    use HasFactory;

    protected $fillable = ['county_id', 'code', 'placename'];
    public function county()
    {
        return $this->belongsTo(County::class);
    }
}

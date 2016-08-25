<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spend extends Model
{
    protected $fillable = ['sdate','stype','snumber','sprovider','sconcept','samount', 'captureid'];
    //
    public function capture(){
      return $this->belongsTo(Capture::class);
    }
}

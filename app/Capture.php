<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capture extends Model
{
    protected $fillable = ['cincharge','cobjective','cdate','cnumber','stotal'];
    //
    public function spend(){
      return $this->hasMany(Spend::class);
    }
}

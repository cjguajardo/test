<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class providers extends Model
{
    //
    protected $table = 'providers';
    public $timestamps = true;
    protected $dateFormat = 'U';
    protected $fillable = [
      'prov_name',
      'prov_doc_type',
      'prov_doc_date',
      'prov_doc_number',
      'prov_doc_value',
      'prov_doc_detalle',
      'check_number',
      'check_value',
      'check_bank',
      'check_date',
      'comment',
      'number'
    ];
    protected $guarded = ['id'];
}

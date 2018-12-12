<?php

namespace Modules\Greentest\Entities;

use Illuminate\Database\Eloquent\Model;

class businessTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','slug','extra','summary','description'];
    protected $table = 'greentest__business_translations';

    public function setSummaryAttribute($value)
    {


    }

}

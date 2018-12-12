<?php

namespace Modules\Greentest\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class business extends Model
{
    use Translatable;

    protected $table = 'greentest__businesses';
    public $translatedAttributes = ['title','slug','extra','summary','description'];
    protected $fillable = ['title','slug','extra','summary','description'];



}

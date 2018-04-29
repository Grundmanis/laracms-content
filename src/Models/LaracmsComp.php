<?php

namespace Grundmanis\Laracms\Modules\Content\Models;

use Illuminate\Database\Eloquent\Model;

class LaracmsComp extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['value'];
    protected $fillable = ['name'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}

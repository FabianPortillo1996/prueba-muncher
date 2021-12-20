<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeResource extends Model
{
    protected $fillable = ['type'];
    protected $guarded = ['id'];
    public $timestamps = false;

    const LOGO_COMMERCE = 'Logo comercio';
    const COVER_COMMERCE = 'Portada comercio';
    const PHOTO_PRODUCT = 'Foto producto';

    const TYPES_RESOURCES = [
        ['type' => self::LOGO_COMMERCE],
        ['type' => self::COVER_COMMERCE],
        ['type' => self::PHOTO_PRODUCT],
    ];

    function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }
}

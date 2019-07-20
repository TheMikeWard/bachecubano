<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

/**
 * ads, ad_description, ad_location, ad_promo, ad_resource, ad_stats
 */
class Ad extends Model
{
    /**
     * Get the Ad that owns the stats.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the ad description
     */
    public function description()
    {
        return $this->hasOne('App\AdDescription')->withDefault([
            'title' => "invalid title",
            'description' => "invalid Description"
        ]);
    }

    /**
     * Get the location
     */
    public function location()
    {
        return $this->hasOne('App\AdLocation');
    }

    /**
     * Get the location
     */
    public function promo()
    {
        return $this->hasOne('App\AdPromo');
    }

    /**
     * Get the location
     */
    public function resources()
    {
        return $this->hasMany('App\AdResource');
    }

    /**
     * Get the location
     */
    public function stats()
    {
        return $this->hasOne('App\AdStats');
    }
}

class AdDescription extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the Ad that owns the stats.
     */
    public function ad()
    {
        return $this->belongsTo('App\Ad')->withDefault([
            'title' => "invalid title",
            'description' => "invalid Description"
        ]);
    }
}

class AdLocation extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the Ad that owns the stats.
     */
    public function ad()
    {
        return $this->belongsTo('App\Ad');
    }
}

class AdPromo extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the Ad that owns the stats.
     */
    public function ad()
    {
        return $this->belongsTo('App\Ad')->withDefault([
            'promotype' => "0",
        ]);
    }
}

class AdResource extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the Ad that owns the stats.
     */
    public function ad()
    {
        return $this->belongsTo('App\Ad');
    }
}

class AdStats extends Model
{
    use Cachable;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the Ad that owns the stats.
     */
    public function ad()
    {
        return $this->belongsTo('App\Ad');
    }
}

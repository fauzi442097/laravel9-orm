<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';

    public $timestamps = true;

    // protected $dateFormat = 'd/m/Y H:i:s';

    protected $guarded = [];

    // Create Events Lifecycle for Model
    // public static function boot()
    // {
    //     parent::boot();

    //     // Event fire when data has been created
    //     static::created(function ($car) {
    //         dd('From boot method', $car);
    //     });

    //     // Event fire when data is creating
    //     static::creating(function ($car) {
    //         dd('creating');
    //     });

    //     static::updated(function ($car) {
    //         dd('Updated from boot', $car);
    //     });
    // }
}

<?php

namespace App\Traits;

trait HasPassword
{
    /**
     *
     */
    public static function bootHasPassword()
    {
        static::creating(function ($model) {
            $model->password = bcrypt($model->password);
        });

        static::updating(function ($model) {
            $model->password = bcrypt($model->password);
        });
    }
}

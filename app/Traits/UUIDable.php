<?php
namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait UUIDable {

    /**
     * Binds creating/saving events to create UUIDs (and also prevent them from being overwritten).
     *
     * @return void
     */
    public static function bootUUIDable()
    {
        static::creating(function ($model) {

            // Generate a UUID on create
            $model->uuid = (Uuid::uuid4())->toString();
        });

        static::saving(function ($model) {
            // Dont allow the UUID to change
            $original_uuid = $model->getOriginal('uuid');

            if ($original_uuid !== $model->uuid) {
                $model->uuid = $original_uuid;
            }
        });


    }


}
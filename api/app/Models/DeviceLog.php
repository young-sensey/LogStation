<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * @property string $log_id Идентификатор
 * @property string $device_id Идентификатор устройства
 * @property string $log_date Дата-время загрузки лога
 */
class DeviceLog extends Model
{
    protected $primaryKey = 'log_id';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->log_id) {
                $model->log_id = (string) Str::uuid();
            }
        });
    }

    /**
     * @var list<string>
     */
    protected $fillable = [
        'device_id', 'log_date'
    ];
}

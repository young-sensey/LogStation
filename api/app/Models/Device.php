<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\DeviceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property string $uuid Идентификатор
 * @property string $name название
 */
class Device extends Model
{
    /** @use HasFactory<DeviceFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'uuid';

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->uuid) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];
}

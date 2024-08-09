<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Penyakit extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'kode',
        'nama',
        'penyebab',
        'solusi',
        'pencegahan',
    ];

    public $timestamps = false;

    protected static $logAttributes = ['nama', 'kode'];
    protected static $ignoreChangedAttributes = ['updated_at'];
    protected static $recordEvents = ['created', 'updated', 'deleted'];
    protected static $logOnlyDirty = true;
    protected static $logName = 'penyakit';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->useLogName($this->logName)
            ->setDescriptionForEvent(fn(string $eventName) => "You have {$eventName} penyakit");
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return "You have {$eventName} penyakit";
    }

    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class)->withPivot('value_cf');
    }
}

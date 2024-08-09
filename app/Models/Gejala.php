<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Gejala extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'nama',
        'kode',
    ];

    public $timestamps = false;

    protected static $logAttributes = ['nama', 'kode'];
    protected static $ignoreChangedAttributes = ['updated_at'];
    protected static $recordEvents = ['created', 'updated', 'deleted'];
    protected static $logOnlyDirty = true;
    protected static $logName = 'gejala';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->useLogName($this->logName)
            ->setDescriptionForEvent(fn(string $eventName) => "You have {$eventName} gejala");
    }

    public function penyakits()
    {
        return $this->belongsToMany(Penyakit::class)->withPivot('value_cf');
    }
}

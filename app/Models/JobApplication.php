<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class JobApplication extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    public const STATUS_SELECT = [
        'single'  => 'Single',
        'married' => 'Married',
    ];

    public const REACH_SELECT = [
        'phone'    => 'Phone',
        'whatsapp' => 'Whatsapp',
        'email'    => 'Email',
    ];

    public const APPLICATION_STATUS_SELECT = [
        'pending'  => 'Pending',
        'accepted' => 'Accepted',
        'rejected' => 'Rejected',
    ];

    public $table = 'job_applications';

    protected $appends = [
        'resume',
    ];

    protected $dates = [
        'birthdate',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'family_name',
        'email',
        'phone',
        'nationality',
        'address',
        'birthdate',
        'status',
        'reach',
        'approve',
        'job_id',
        'application_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getBirthdateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getResumeAttribute()
    {
        return $this->getMedia('resume')->last();
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

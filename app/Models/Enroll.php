<?php

namespace App\Models;

use Carbon\Carbon;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;

    public const STATUS_SELECT = [
        'pending'  => 'Pending',
        'hold'     => 'Hold',
        'accepted' => 'Accepted',
    ];
    public const REACH_US = [
        'instagram'  => 'From instagram',
        'friend'     => 'Friend told me',
        'facebook' => 'From facebook',
        'website' => 'From website',
        'other' => 'Other',
    ];

    public $table = 'enrolls';

    protected $dates = [
        'created_at',
        'updated_at',
        'course_start',
        'course_end',
    ];

    protected $fillable = [
        'name',
        'family_name',
        'birthdate',
        'age',
        'gender',
        'id_card',
        'email',
        'phone',
        'parent_phone',
        'nationality',
        'address',
        'degree',
        'job',
        'knowledge',
        'reach_us',
        'affiliation_term',
        'withdrawal_term',
        'contract',
        'course_id',
        'status',
        'created_at',
        'updated_at',
        'course_start',
        'course_end',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function getCourseStartAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function getBirthdateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function getCourseEndAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function setCourseStartAttribute($value)
    {
        $this->attributes['course_start'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function setCourseEndAttribute($value)
    {
        $this->attributes['course_end'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

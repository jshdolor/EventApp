<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event_title', 'start_date', 'end_date', 'recurrence'
    ];

    public function getRecurrenceAttribute($value): array
    {
        return collect(explode('|', $value))
            ->map(function($day) {
                return $day === '1';
            })->toArray();
    }

    public function setRecurrenceAttribute($value)
    {
        $value = explode(',', $value);

        $this->attributes['recurrence'] = collect($value)
            ->map(function($day) {
                return $day === 'true'? '1': '0';
            })->implode('|');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $dates = ['start_work', 'begin_date', 'end_date'];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\user');
    }


    public function getDureAttributs() {
        return $this->end_date;
    }

    public function scopeFilter($query, array $filters){
            $query
                ->whereHas('employee' ,function($q) {
                    return $q->where('name','like', '%' . trim(request('query')) . '%');
                })
                ->orderByDesc('id');
    }
}

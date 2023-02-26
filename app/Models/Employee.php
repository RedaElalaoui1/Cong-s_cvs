<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Employee extends Model
{
    use HasFactory;



    protected $dates = ['start_work','last_m_of_l'];
    // protected $hidde = ['email'];
    protected $appends = ['days_leave'];



    public function leaves()
    {
        return $this->hasMany('App\Models\Leave');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getCongeStartDate($daysConj)
    {
            if ($this->start_work->diffInMonths(now()) <= 6)
                return 1; //return 0;

            elseif (($this->start_work->diffInMonths(now()) > 6) && ($this->start_work->diffInMonths(now()) <= 24) )
            {
                if(!$this->last_m_of_l){
                    $days_available=($this->start_work->diffInMonths(now())*1.5);
                }
                else{
                $days_available=($this->last_m_of_l->diffInMonths(now())*1.5);
                }

                $date = now();
                $months = $daysConj/1.5;
                $days = $months - intval($daysConj/1.5);
                $days = $days*30;
                if($daysConj<=$days_available)
                {
                    if(!$this->last_m_of_l){
                        $this->last_m_of_l = $this->start_work->addMonth(intval($months))->addDay($days)->format("Y-m-d");
                    }
                    else{
                        $this->last_m_of_l = $this->last_m_of_l->addMonth(intval($months))->addDay($days)->format("Y-m-d");
                    }
                return 2;
                }
                else
                return 3;
            }
            else{
                if(!$this->last_m_of_l){
                        $days_available=36;

                        if($daysConj<=$days_available)
                        {
                        $date = now();
                        $months = $daysConj/1.5;
                        $days = $months - intval($daysConj/1.5);
                        $days = $days*30;
                        $this->last_m_of_l=$date->subYears(2)->addMonth($months)->addDay($days)->format("Y-m-d");
                        return 2;
                        }
                        else
                        return 3;
                }
                else{
                    if ($this->last_m_of_l->diffInMonths(now())<=24){
                        $days_available=($this->last_m_of_l->diffInMonths(now())*1.5);

                        if($daysConj<=$days_available)
                        {
                        $months = $daysConj/1.5;
                        $days = $months - intval($daysConj/1.5);
                        $days = $days*30;
                        $this->last_m_of_l=$this->last_m_of_l->addMonth($months)->addDay($days)->format("Y-m-d");
                        return 2;
                        }
                        else
                        return 3;

                        }
                        else{
                            $days_available=36;
                            if($daysConj<=$days_available)
                            {
                            $date = now();
                            $months = $daysConj/1.5;
                            $days = $months - intval($daysConj/1.5);
                            $days = $days*30;
                            $this->last_m_of_l=$date->subYears(2)->addMonth($months)->addDay($days)->format("Y-m-d");
                            return 2;
                            }
                            else
                            return 3;

                        }
                }

            }
    }

    public function getDaysLeaveAttribute()
    {

        if ($this->start_work->diffInMonths(now()) <= 6)
        return 0;

    elseif (($this->start_work->diffInMonths(now()) > 6) && ($this->start_work->diffInMonths(now()) <= 24) )
    {
        if(!$this->last_m_of_l){
            return intval($this->start_work->diffInMonths(now())*1.5);
        }
        else{
            return intval($this->last_m_of_l->diffInMonths(now())*1.5);
        }

    }
    else{
        if(!$this->last_m_of_l){
                return 36;

        }
        else{
            if ($this->last_m_of_l->diffInMonths(now())<=24){
                return intval($this->last_m_of_l->diffInMonths(now())*1.5);

                }
                else{
                    return 36;

                }
        }

    }



    }

}

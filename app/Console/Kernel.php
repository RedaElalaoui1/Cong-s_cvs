<?php

namespace App\Console;

use App\Models\Employee;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use DateTime;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
             // $schedule->command('inspire')->hourly();

        // $emps = Employee::all();

        // $schedule->call(function () {
        //     DB::table('employees')->increment('jrs_leave', 0.05);;
        // })->dailyAt('22:39');


        // $schedule->call(function () {
        //     DB::table('employees')->increment('jrs_leave', 0.05);;
        // })->everyMinute();


        // $schedule->call(function () {
        //     DB::table('employees')->increment('jrs_leave', 1.5);;
        // })->monthlyOn(4, '15:00');;

                // $schedule->call(function () {

                //     $emps = Employee::all();
                //     foreach($emps as $emp){
                //         $date=new DateTime(date('y-m-d h:i:s'));
                //         $day = intval($date->format('d'));
                //         $day_cr = intval($emp->created_at->format('d'));
                //         if($day_cr == $day ){

                //             DB::table('employees')->where('id', $emp->id)->increment('jrs_leave', 1.5);;
                //             DB::table('employees')->where('id', $emp->id)->increment('var', 1);;
                //     }

                //  }
                // })->dailyAt('14:22');

                // $schedule->call(function () {

                //     $emps = Employee::all();
                //     foreach($emps as $emp){

                //         $date=new DateTime(date('y-m-d h:i:s'));
                //         $day = intval($date->format('d'));
                //         $day_cr = intval($emp->created_at->format('d'));


                //         if($day_cr == $day ){

                //             if($emp->var == 24){

                //                 DB::table('employees')->where('id', $emp->id)->update(['jrs_leave' => 1.5,'var'=>1]);
                //             }

                //             else{

                //                 DB::table('employees')->where('id', $emp->id)->increment('jrs_leave', 1.5);
                //                 DB::table('employees')->where('id', $emp->id)->increment('var', 1);

                //             }

                //         }

                //     }
                // })->dailyAt('00:00');




    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

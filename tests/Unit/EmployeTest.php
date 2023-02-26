<?php

namespace Tests\Unit;

use App\Models\Employee;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;
class EmployeTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {

        $this->assertTrue(true);
    }

     /**
     * differance Conge Start Date test .
     *
     * @return void
     */
    public function test_get_conge_start_date()
    {
        Artisan::call('db:seed');
        $employe = Employee::first();
        $employe->start_work = now()->subMonths(6);
        $this->assertTrue($employe->getCongeStartDate() === 6);
    }
}
